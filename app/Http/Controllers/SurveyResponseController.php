<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Support\Facades\Auth;

class SurveyResponseController extends Controller
{
    public function index()
    {
        $surveys = Survey::where('is_active', true)->latest()->paginate(10);
        return view('user.surveys.index', compact('surveys'));
    }

    public function show(Survey $survey)
    {
        return view('user.surveys.show', compact('survey'));
    }

    public function store(Request $request, Survey $survey)
    {
        $request->validate([
            'review_text' => 'required|string|min:5',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $user = Auth::user();
        // Check if user has already responded
        if (SurveyResponse::where('user_id', $user->id)->where('survey_id', $survey->id)->exists()) {
            return back()->withErrors(['error' => 'You have already completed this survey.']);
        }
        // Deduct price from user balance if needed
        if ($survey->price > 0) {
            if ($user->balance < $survey->price) {
                return back()->withErrors(['error' => 'Insufficient balance to participate.']);
            }
            $user->balance -= $survey->price;
            $user->save();
        }
        // Store response and mark as paid if price > 0
        SurveyResponse::create([
            'user_id' => $user->id,
            'survey_id' => $survey->id,
            'review_text' => $request->review_text,
            'rating' => $request->rating,
            'paid' => $survey->price > 0,
            'commission_earned' => $survey->price > 0 ? $survey->price * 0.1 : 0, // Example: 10% commission
        ]);
        // Add commission to user
        $user->balance += $survey->price > 0 ? $survey->price * 0.1 : 0;
        $user->save();
        return redirect()->route('user.surveys.history')->with('success', 'Survey submitted successfully!');
    }

    public function history()
    {
        $responses = SurveyResponse::where('user_id', Auth::id())->with('survey')->latest()->paginate(10);
        return view('user.surveys.history', compact('responses'));
    }
} 