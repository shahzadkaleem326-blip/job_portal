<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function dashboard()
    {
        $company = Company::where('user_id', Auth::id())->first();
        $jobs = collect();

        if($company) {
            $jobs = JobListing::where('company_id', $company->id)
                ->latest()
                ->get();
        }

        return view('employer.dashboard', compact('company', 'jobs'));
    }

    public function createCompany()
    {
        $company = Company::where('user_id', Auth::id())->first();
        return view('employer.company', compact('company'));
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'website' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        Company::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'company_name' => $request->company_name,
                'description' => $request->description,
                'location' => $request->location,
                'website' => $request->website,
                'phone' => $request->phone,
            ]
        );

        return redirect()->route('employer.dashboard')->with('success', 'Company profile save ho gaya!');
    }

    public function createJob()
    {
        return view('employer.create-job');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'salary' => 'nullable|string',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'deadline' => 'nullable|date',
        ]);

        $company = Company::where('user_id', Auth::id())->first();

        JobListing::create([
            'company_id' => $company->id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'status' => 'active',
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('employer.dashboard')->with('success', 'Job post ho gayi!');
    }

    public function viewApplications($jobId)
    {
        $job = JobListing::findOrFail($jobId);
        $applications = Application::where('job_listing_id', $jobId)
            ->with('user')
            ->latest()
            ->get();

        return view('employer.applications', compact('job', 'applications'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $application->update(['status' => $request->status]);

        return back()->with('success', 'Status update ho gaya!');
    }
}