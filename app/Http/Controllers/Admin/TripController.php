<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Company;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $query = Trip::with('company');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                  ->orWhere('destination', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by company
        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        // Sort
        $sortable = ['id', 'title', 'price', 'created_at', 'status'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        
        if (in_array($sort, $sortable)) {
            $query->orderBy($sort, $direction);
        }

        $trips = $query->paginate(15)->appends($request->query());
        $companies = Company::active()->get();

        return view('admin.trips.index', compact('trips', 'companies'));
    }

    public function create()
    {
        $companies = Company::active()->get();
        return view('admin.trips.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
            'category' => 'required|string|max:100',
            'difficulty' => 'required|in:easy,moderate,challenging,expert',
            'group_size' => 'required|integer|min:1',
            'total_seats' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,inactive,draft',
            'featured' => 'boolean',
            'journey_locked' => 'boolean',
            'journey_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['journey_locked'] = $request->has('journey_locked');
        $data['seats_available'] = $request->total_seats;

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trips', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('trips/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Trip::create($data);

        return redirect()->route('admin.trips.index')->with('success', 'Trip created successfully!');
    }

    public function show($id)
    {
        $trip = Trip::with(['company', 'bookings', 'reviews'])->findOrFail($id);
        return view('admin.trips.show', compact('trip'));
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $companies = Company::active()->get();
        return view('admin.trips.edit', compact('trip', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
            'category' => 'required|string|max:100',
            'difficulty' => 'required|in:easy,moderate,challenging,expert',
            'group_size' => 'required|integer|min:1',
            'total_seats' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:active,inactive,draft',
            'featured' => 'boolean',
            'journey_locked' => 'boolean',
            'journey_price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['journey_locked'] = $request->has('journey_locked');
        $data['seats_available'] = $request->total_seats;

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trips', 'public');
        }

        // Handle gallery uploads
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('trips/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $trip->update($data);

        return redirect()->route('admin.trips.index')->with('success', 'Trip updated successfully!');
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('admin.trips.index')->with('success', 'Trip deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->status = $trip->status === 'active' ? 'inactive' : 'active';
        $trip->save();

        return back()->with('success', 'Trip status updated successfully!');
    }

    public function toggleFeatured($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->featured = !$trip->featured;
        $trip->save();

        return back()->with('success', 'Trip featured status updated successfully!');
    }

    public function toggleJourneyLock($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->journey_locked = !$trip->journey_locked;
        $trip->save();

        $status = $trip->journey_locked ? 'locked' : 'unlocked';
        return back()->with('success', "Journey {$status} successfully!");
    }
} 