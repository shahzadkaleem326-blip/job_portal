@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-tachometer-alt me-2"></i>Employer Dashboard</h2>
        <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
    <span class="badge" style="background: linear-gradient(135deg, #065f46, #10b981); font-size: 0.9rem; padding: 10px 20px; border-radius: 20px;">
        <i class="fas fa-building me-1"></i> Employer
    </span>
</div>

@if(!$company)
<div class="card text-center p-5" style="border-radius: 20px; border: 2px dashed #2563eb;">
    <i class="fas fa-building" style="font-size: 4rem; color: #2563eb; opacity: 0.5;"></i>
    <h4 class="mt-3" style="color: #1a3c6e;">Setup Your Company Profile</h4>
    <p class="text-muted">Create your company profile to start posting jobs!</p>
    <a href="{{ route('employer.company') }}" class="btn btn-primary btn-lg mt-2" style="border-radius: 20px;">
        <i class="fas fa-plus me-2"></i> Create Company Profile
    </a>
</div>
@else

{{-- Stats --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card stat-blue">
            <i class="fas fa-briefcase" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $jobs->count() }}</h3>
            <p>Total Jobs Posted</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-green">
            <i class="fas fa-check-circle" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $jobs->where('status', 'active')->count() }}</h3>
            <p>Active Jobs</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-orange">
            <i class="fas fa-times-circle" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $jobs->where('status', 'closed')->count() }}</h3>
            <p>Closed Jobs</p>
        </div>
    </div>
</div>

{{-- Action Buttons --}}
<div class="row g-3 mb-4">
    <div class="col-md-6">
        <a href="{{ route('employer.job.create') }}" class="btn btn-primary w-100 btn-lg">
            <i class="fas fa-plus me-2"></i> Post New Job
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('employer.company') }}" class="btn w-100 btn-lg" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
            <i class="fas fa-building me-2"></i> Edit Company Profile
        </a>
    </div>
</div>

{{-- Job Listings --}}
<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
        <i class="fas fa-list me-2"></i>My Job Listings
    </div>
    <div class="card-body p-0">
        @if($jobs->isEmpty())
            <div class="text-center p-5">
                <i class="fas fa-briefcase" style="font-size: 3rem; color: #cbd5e1;"></i>
                <p class="text-muted mt-3">Abhi tak koi job post nahi ki!</p>
                <a href="{{ route('employer.job.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Post First Job
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Deadline</th>
                            <th>Applications</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $key => $job)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><strong>{{ $job->title }}</strong></td>
                            <td><span class="badge" style="background: #eff6ff; color: #1a3c6e;">{{ $job->job_type }}</span></td>
                            <td>
                                @if($job->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Closed</span>
                                @endif
                            </td>
                            <td>{{ $job->deadline ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('employer.applications', $job->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endif
@endsection