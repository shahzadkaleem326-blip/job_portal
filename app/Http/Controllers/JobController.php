<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('company')
            ->where('status', 'active')
            ->latest()
            ->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = JobListing::with('company')->findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    public function search(Request $request)
    {
        $query = JobListing::with('company')->where('status', 'active');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->latest()->paginate(10);

        return view('jobs.index', compact('jobs'));
    }
}