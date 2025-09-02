<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Company::withCount('trips');

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('country', 'like', "%$search%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('featured', $request->featured);
        }

        // Sort
        $sortable = ['id', 'name', 'rating', 'total_reviews', 'created_at', 'status'];
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');
        
        if (in_array($sort, $sortable)) {
            $query->orderBy($sort, $direction);
        }

        $companies = $query->paginate(15)->appends($request->query());

        // Calculate reviews_count for each company via trips
        foreach ($companies as $company) {
            $company->reviews_count = \App\Models\Review::whereIn('trip_id', $company->trips()->pluck('id'))->count();
        }

        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'nullable|url|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:100',
            'established_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialties' => 'nullable|array',
            'certifications' => 'nullable|array'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['rating'] = 0;
        $data['total_reviews'] = 0;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        Company::create($data);

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully!');
    }

    public function show($id)
    {
        $company = Company::with(['trips', 'reviews'])->findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'nullable|url|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:500',
            'country' => 'required|string|max:100',
            'established_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialties' => 'nullable|array',
            'certifications' => 'nullable|array'
        ]);

        $data = $request->all();
        $data['featured'] = $request->has('featured');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company->update($data);

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully!');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully!');
    }

    public function toggleStatus($id)
    {
        $company = Company::findOrFail($id);
        $company->status = $company->status === 'active' ? 'inactive' : 'active';
        $company->save();

        return back()->with('success', 'Company status updated successfully!');
    }

    public function toggleFeatured($id)
    {
        $company = Company::findOrFail($id);
        $company->featured = !$company->featured;
        $company->save();

        return back()->with('success', 'Company featured status updated successfully!');
    }
} 