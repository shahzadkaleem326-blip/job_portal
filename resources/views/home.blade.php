{{-- @extends('layouts.app')

@section('content')

Hero Section
<div style="background: linear-gradient(135deg, #1a1a2e, #16213e); color: white; padding: 80px 0; margin: -24px -12px 40px; text-align: center;">
    <h1 style="font-size: 3rem; font-weight: bold;">Find Your Dream Job</h1>
    <p style="font-size: 1.2rem; margin: 15px 0 30px;">Thousands of jobs available — apply today!</p>
    <form action="{{ route('jobs.search') }}" method="GET" class="d-flex justify-content-center gap-2">
        <input type="text" name="search" class="form-control w-25" placeholder="Job title...">
        <input type="text" name="location" class="form-control w-25" placeholder="Location...">
        <button type="submit" class="btn btn-warning px-4">
            <i class="fas fa-search"></i> Search
        </button>
    </form>
</div>

Stats Section 
<div class="row text-center mb-5">
    <div class="col-md-4">
        <div class="card shadow p-4">
            <h2 class="text-dark fw-bold">{{ $totalJobs }}</h2>
            <p class="text-muted">Jobs Available</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-4">
            <h2 class="text-dark fw-bold">{{ $totalCompanies }}</h2>
            <p class="text-muted">Companies</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-4">
            <h2 class="text-dark fw-bold">{{ $totalUsers }}</h2>
            <p class="text-muted">Registered Users</p>
        </div>
    </div>
</div>

Latest Jobs 
<h3 class="mb-4"><i class="fas fa-fire text-danger"></i> Latest Jobs</h3>
@foreach($latestJobs as $job)
<div class="card shadow mb-3">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h5 class="mb-1">{{ $job->title }}</h5>
                <p class="text-muted mb-1">
                    <i class="fas fa-building"></i> {{ $job->company->company_name }}
                    &nbsp;|&nbsp;
                    <i class="fas fa-map-marker-alt"></i> {{ $job->location ?? 'Not specified' }}
                    &nbsp;|&nbsp;
                    <i class="fas fa-money-bill"></i> {{ $job->salary ?? 'Not specified' }}
                </p>
                <span class="badge bg-dark">{{ $job->job_type }}</span>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-dark btn-sm">
                    View & Apply
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="text-center mt-4 mb-5">
    <a href="{{ route('jobs.index') }}" class="btn btn-dark btn-lg">
        <i class="fas fa-briefcase"></i> View All Jobs
    </a>
</div>

 Register Section 
@guest
<div class="card shadow text-center p-5 mb-5" style="background: #f8f9fa;">
    <h3>Ready to get started?</h3>
    <p class="text-muted">Register as Job Seeker or Employer today!</p>
    <div>
        <a href="{{ route('register') }}" class="btn btn-dark btn-lg me-3">
            <i class="fas fa-user-plus"></i> Register Now
        </a>
        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    </div>
</div>
@endguest

@endsection --}}


@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<div style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white; padding: 100px 0; margin: -24px -12px 40px; text-align: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -80px; left: -80px; width: 400px; height: 400px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <h1 style="font-size: 3.5rem; font-weight: 700; margin-bottom: 15px;">Find Your <span style="color: #93c5fd;">Dream Job</span></h1>
        <p style="font-size: 1.2rem; opacity: 0.9; margin-bottom: 40px;">Thousands of jobs available — Start your career today!</p>
        <form action="{{ route('jobs.search') }}" method="GET">
            <div class="row justify-content-center g-2">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control form-control-lg"
                        placeholder="🔍 Job title or keyword..." style="border-radius: 10px;">
                </div>
                <div class="col-md-3">
                    <input type="text" name="location" class="form-control form-control-lg"
                        placeholder="📍 Location..." style="border-radius: 10px;">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning btn-lg w-100" style="border-radius: 10px; font-weight: 600;">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Stats Section --}}
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="stat-card stat-blue">
            <i class="fas fa-briefcase" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalJobs }}+</h3>
            <p>Jobs Available</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-green">
            <i class="fas fa-building" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalCompanies }}+</h3>
            <p>Companies</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-orange">
            <i class="fas fa-users" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalUsers }}+</h3>
            <p>Registered Users</p>
        </div>
    </div>
</div>

{{-- Latest Jobs --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="page-title mb-0"><i class="fas fa-fire text-danger me-2"></i>Latest Jobs</h3>
    <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-sm">View All Jobs</a>
</div>

@forelse($latestJobs as $job)
<div class="card mb-3">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-1 text-center">
                <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-briefcase text-white"></i>
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="mb-1 fw-600">{{ $job->title }}</h5>
                <p class="text-muted mb-1" style="font-size: 0.9rem;">
                    <i class="fas fa-building me-1 text-primary"></i> {{ $job->company->company_name }}
                    &nbsp;|&nbsp;
                    <i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $job->location ?? 'Not specified' }}
                    &nbsp;|&nbsp;
                    <i class="fas fa-money-bill me-1 text-success"></i> {{ $job->salary ?? 'Not specified' }}
                </p>
                <span class="badge" style="background: #eff6ff; color: #1a3c6e;">{{ $job->job_type }}</span>
            </div>
            <div class="col-md-3 text-end">
                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-eye me-1"></i> View & Apply
                </a>
            </div>
        </div>
    </div>
</div>
@empty
    <div class="alert alert-info text-center">Abhi koi job available nahi hai!</div>
@endforelse

<div class="text-center mt-4 mb-3">
    <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-briefcase me-2"></i> View All Jobs
    </a>
</div>

{{-- CTA Section --}}
@guest
<div class="card mt-5" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white; border-radius: 20px;">
    <div class="card-body text-center p-5">
        <h3 class="fw-bold mb-3">Ready to Start Your Career?</h3>
        <p class="mb-4" style="opacity: 0.9;">Join thousands of job seekers and employers on our platform!</p>
        <a href="{{ route('register') }}" class="btn btn-warning btn-lg me-3" style="border-radius: 10px; font-weight: 600;">
            <i class="fas fa-user-plus me-2"></i> Register as Job Seeker
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg" style="border-radius: 10px; font-weight: 600;">
            <i class="fas fa-building me-2"></i> Register as Employer
        </a>
    </div>
</div>
@endguest

@endsection