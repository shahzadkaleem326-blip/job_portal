@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="page-title mb-0"><i class="fas fa-briefcase me-2"></i>All Jobs</h2>
</div>

{{-- Search Bar --}}
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('jobs.search') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text" style="background: #eff6ff;">
                            <i class="fas fa-search" style="color: #2563eb;"></i>
                        </span>
                        <input type="text" name="search" class="form-control"
                            placeholder="Job title..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text" style="background: #eff6ff;">
                            <i class="fas fa-map-marker-alt" style="color: #2563eb;"></i>
                        </span>
                        <input type="text" name="location" class="form-control"
                            placeholder="Location..." value="{{ request('location') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <select name="job_type" class="form-select">
                        <option value="">All Types</option>
                        <option value="full-time" {{ request('job_type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time" {{ request('job_type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ request('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ request('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Jobs List --}}
@if($jobs->isEmpty())
    <div class="card text-center p-5">
        <i class="fas fa-search" style="font-size: 3rem; color: #cbd5e1;"></i>
        <p class="text-muted mt-3">Koi job nahi mili!</p>
    </div>
@else
    @foreach($jobs as $job)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-1 text-center">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-briefcase text-white"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <h5 class="mb-1 fw-bold">{{ $job->title }}</h5>
                    <p class="text-muted mb-1" style="font-size: 0.9rem;">
                        <i class="fas fa-building me-1 text-primary"></i> {{ $job->company->company_name }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $job->location ?? 'Not specified' }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-money-bill me-1 text-success"></i> {{ $job->salary ?? 'Not specified' }}
                    </p>
                    <span class="badge" style="background: #eff6ff; color: #1a3c6e;">{{ $job->job_type }}</span>
                    @if($job->deadline)
                        <span class="badge ms-2" style="background: #fef9ee; color: #92400e;">
                            <i class="fas fa-calendar me-1"></i> {{ $job->deadline }}
                        </span>
                    @endif
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">
                        <i class="fas fa-eye me-1"></i> View Details
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-3">
        {{ $jobs->links() }}
    </div>
@endif
@endsection