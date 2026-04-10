@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<div style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white; padding: 80px 0; margin: -24px -12px 40px; text-align: center; position: relative; overflow: hidden;">
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

{{-- 3 Role Cards --}}
<div class="container mb-5">
    <div class="text-center mb-4">
        <h4 class="fw-bold" style="color: #1a3c6e;">
            <i class="fas fa-th-large me-2"></i> Select Your Role
        </h4>
        <p class="text-muted">Apna role select karke apne panel mein jaein</p>
    </div>
    <div class="row g-4 justify-content-center">

        {{-- Admin --}}
        <div class="col-md-4">
            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; border: 2px solid #e0eaff; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(37,99,235,0.1);">
                    <div style="width: 75px; height: 75px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 1.8rem; color: white;">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #1a3c6e;">Admin</h5>
                    <p class="text-muted mb-3" style="font-size: 0.88rem;">Users, companies, jobs aur applications ko manage karo</p>
                    <span class="btn btn-sm text-white px-4" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 20px;">
                        <i class="fas fa-arrow-right me-1"></i> Admin Panel
                    </span>
                </div>
            </a>
        </div>

        {{-- Employer --}}
        <div class="col-md-4">
            <a href="{{ route('employer.dashboard') }}" class="text-decoration-none">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; border: 2px solid #d1fae5; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(16,185,129,0.1);">
                    <div style="width: 75px; height: 75px; background: linear-gradient(135deg, #065f46, #10b981); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 1.8rem; color: white;">
                        <i class="fas fa-building"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #065f46;">Employer</h5>
                    <p class="text-muted mb-3" style="font-size: 0.88rem;">Jobs post karo, applications dekho aur company profile manage karo</p>
                    <span class="btn btn-sm text-white px-4" style="background: linear-gradient(135deg, #065f46, #10b981); border-radius: 20px;">
                        <i class="fas fa-arrow-right me-1"></i> Employer Panel
                    </span>
                </div>
            </a>
        </div>

        {{-- Jobseeker --}}
        <div class="col-md-4">
            <a href="{{ route('jobseeker.dashboard') }}" class="text-decoration-none">
                <div style="background: white; border-radius: 20px; padding: 35px 25px; text-align: center; border: 2px solid #fef3c7; transition: all 0.3s ease; box-shadow: 0 5px 20px rgba(245,158,11,0.1);">
                    <div style="width: 75px; height: 75px; background: linear-gradient(135deg, #92400e, #f59e0b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 1.8rem; color: white;">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #92400e;">Jobseeker</h5>
                    <p class="text-muted mb-3" style="font-size: 0.88rem;">Jobs dhundo, apply karo aur apna resume upload karo</p>
                    <span class="btn btn-sm text-white px-4" style="background: linear-gradient(135deg, #92400e, #f59e0b); border-radius: 20px;">
                        <i class="fas fa-arrow-right me-1"></i> Jobseeker Panel
                    </span>
                </div>
            </a>
        </div>

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
                <h5 class="mb-1">{{ $job->title }}</h5>
                <p class="text-muted mb-1" style="font-size: 0.9rem;">
                    <i class="fas fa-building me-1 text-primary"></i> {{ $job->company->company_name ?? 'N/A' }}
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