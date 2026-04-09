<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\JobListing;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCompanies = Company::count();
        $totalJobs = JobListing::count();
        $totalApplications = Application::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCompanies',
            'totalJobs',
            'totalApplications'
        ));
    }

    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User delete ho gaya!');
    }

    public function companies()
    {
        $companies = Company::with('user')->latest()->paginate(10);
        return view('admin.companies', compact('companies'));
    }

    public function deleteCompany($id)
    {
        Company::findOrFail($id)->delete();
        return back()->with('success', 'Company delete ho gayi!');
    }

    public function jobs()
    {
        $jobs = JobListing::with('company')->latest()->paginate(10);
        return view('admin.jobs', compact('jobs'));
    }

    public function deleteJob($id)
    {
        JobListing::findOrFail($id)->delete();
        return back()->with('success', 'Job delete ho gayi!');
    }

    public function applications()
    {
        $applications = Application::with('user', 'jobListing.company')
            ->latest()
            ->paginate(10);
        return view('admin.applications', compact('applications'));
    }

    public function exportUsers()
{
    return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\UsersExport, 'users.xlsx');
}

public function exportCompanies()
{
    return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\CompaniesExport, 'companies.xlsx');
}

public function exportJobs()
{
    return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\JobsExport, 'jobs.xlsx');
}

public function exportApplications()
{
    return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\ApplicationsExport, 'applications.xlsx');
}
}