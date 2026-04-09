<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Application;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function dashboard()
    {
        $applications = Application::where('user_id', Auth::id())
            ->with('jobListing.company')
            ->latest()
            ->get();

        return view('jobseeker.dashboard', compact('applications'));
    }

    public function searchJobs(Request $request)
    {
        $query = JobListing::with('company')->where('status', 'active');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->latest()->paginate(10);

        return view('jobseeker.jobs', compact('jobs'));
    }

    public function applyJob(Request $request, $id)
    {
        $job = JobListing::findOrFail($id);

        $already = Application::where('user_id', Auth::id())
            ->where('job_listing_id', $id)
            ->first();

        if ($already) {
            return back()->with('error', 'Aap pehle se apply kar chuke hain!');
        }

        Application::create([
            'user_id' => Auth::id(),
            'job_listing_id' => $id,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submit ho gayi!');
    }

   public function uploadResume(Request $request)
{
    $request->validate([
        'resume' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    $file = $request->file('resume');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('resumes'), $filename);

    Resume::create([
        'user_id' => Auth::id(),
        'file_path' => $filename,
        'original_name' => $file->getClientOriginalName(),
    ]);

    return redirect()->route('jobseeker.resume.page')->with('success', 'Resume upload ho gaya!');
}

    public function resumePage()
{
    $resumes = Resume::where('user_id', Auth::id())->latest()->get();
    return view('jobseeker.resume', compact('resumes'));
}
}