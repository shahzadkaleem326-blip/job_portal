@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-tachometer-alt me-2"></i>Job Seeker Dashboard</h2>
        <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
    <span class="badge" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); font-size: 0.9rem; padding: 10px 20px; border-radius: 20px;">
        <i class="fas fa-user-tie me-1"></i> Job Seeker
    </span>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card stat-blue">
            <i class="fas fa-file-alt" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $applications->count() }}</h3>
            <p>Total Applications</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-green">
            <i class="fas fa-check-circle" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $applications->where('status', 'accepted')->count() }}</h3>
            <p>Accepted</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-orange">
            <i class="fas fa-clock" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $applications->where('status', 'pending')->count() }}</h3>
            <p>Pending</p>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <a href="{{ route('jobs.index') }}" class="btn btn-primary w-100 btn-lg">
            <i class="fas fa-search me-2"></i> Search Jobs
        </a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('jobseeker.resume.page') }}" class="btn w-100 btn-lg" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
            <i class="fas fa-upload me-2"></i> Upload Resume
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
        <i class="fas fa-list me-2"></i>My Applications
    </div>
    <div class="card-body p-0">
        @if($applications->isEmpty())
            <div class="text-center p-5">
                <i class="fas fa-search" style="font-size: 3rem; color: #cbd5e1;"></i>
                <p class="text-muted mt-3">Abhi tak koi application nahi ki!</p>
                <a href="{{ route('jobs.index') }}" class="btn btn-primary">
                    <i class="fas fa-search me-2"></i> Search Jobs Now
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Applied On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $key => $app)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><strong>{{ $app->jobListing->title }}</strong></td>
                            <td>{{ $app->jobListing->company->company_name }}</td>
                            <td>
                                @if($app->status === 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @elseif($app->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ $app->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection