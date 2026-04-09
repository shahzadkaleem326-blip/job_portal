@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard</h2>
        <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
    <span class="badge" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); font-size: 0.9rem; padding: 10px 20px; border-radius: 20px;">
        <i class="fas fa-shield-alt me-1"></i> Administrator
    </span>
</div>

{{-- Stats Cards --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card stat-blue">
            <i class="fas fa-users" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalUsers }}</h3>
            <p>Total Users</p>
            <a href="{{ route('admin.users') }}" class="btn btn-sm mt-2" style="background: rgba(255,255,255,0.2); color: white; border-radius: 20px;">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-green">
            <i class="fas fa-building" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalCompanies }}</h3>
            <p>Total Companies</p>
            <a href="{{ route('admin.companies') }}" class="btn btn-sm mt-2" style="background: rgba(255,255,255,0.2); color: white; border-radius: 20px;">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-orange">
            <i class="fas fa-briefcase" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalJobs }}</h3>
            <p>Total Jobs</p>
            <a href="{{ route('admin.jobs') }}" class="btn btn-sm mt-2" style="background: rgba(255,255,255,0.2); color: white; border-radius: 20px;">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-red">
            <i class="fas fa-file-alt" style="font-size: 2rem; opacity: 0.8; margin-bottom: 10px;"></i>
            <h3>{{ $totalApplications }}</h3>
            <p>Total Applications</p>
            <a href="{{ route('admin.applications') }}" class="btn btn-sm mt-2" style="background: rgba(255,255,255,0.2); color: white; border-radius: 20px;">
                View All <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
    {{-- Quick Links --}}
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
                <i class="fas fa-bolt me-2"></i>Quick Actions
            </div>
            <div class="card-body">
                <a href="{{ route('admin.users') }}" class="btn btn-primary w-100 mb-3">
                    <i class="fas fa-users me-2"></i> Manage Users
                </a>
                <a href="{{ route('admin.companies') }}" class="btn btn-primary w-100 mb-3">
                    <i class="fas fa-building me-2"></i> Manage Companies
                </a>
                <a href="{{ route('admin.jobs') }}" class="btn btn-primary w-100 mb-3">
                    <i class="fas fa-briefcase me-2"></i> Manage Jobs
                </a>
                <a href="{{ route('admin.applications') }}" class="btn btn-primary w-100">
                    <i class="fas fa-file-alt me-2"></i> Manage Applications
                </a>
            </div>
        </div>
    </div>

    {{-- Reports --}}
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-header" style="background: linear-gradient(135deg, #065f46, #10b981); color: white;">
                <i class="fas fa-download me-2"></i>Download Reports
            </div>
            <div class="card-body">
                <a href="{{ route('admin.export.users') }}" class="btn w-100 mb-3" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
                    <i class="fas fa-file-excel me-2"></i> Users Report
                </a>
                <a href="{{ route('admin.export.companies') }}" class="btn w-100 mb-3" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
                    <i class="fas fa-file-excel me-2"></i> Companies Report
                </a>
                <a href="{{ route('admin.export.jobs') }}" class="btn w-100 mb-3" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
                    <i class="fas fa-file-excel me-2"></i> Jobs Report
                </a>
                <a href="{{ route('admin.export.applications') }}" class="btn w-100" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
                    <i class="fas fa-file-excel me-2"></i> Applications Report
                </a>
            </div>
        </div>
    </div>
</div>
@endsection