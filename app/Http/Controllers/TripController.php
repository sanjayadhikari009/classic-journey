<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        return view('trips.index');
    }

    public function show($id)
    {
        return view('trips.show');
    }

    public function search(Request $request)
    {
        return view('trips.search');
    }
} 