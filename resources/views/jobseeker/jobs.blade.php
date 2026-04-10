@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="mb-4">
    <h2 class="page-title mb-0">
        <i class="fas fa-search me-2"></i> Search Jobs
    </h2>
    <p class="text-muted mb-0">Apni pasand ki job dhundein</p>
</div>

{{-- Search Filter Card --}}
<div class="card shadow mb-4" style="border-radius: 15px; overflow: hidden; border: none;">
    <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
        <h5 class="mb-0"><i class="fas fa-filter me-2"></i> Filter Jobs</h5>
    </div>
    <div class="card-body" style="background: #f8faff;">
        <form action="{{ route('jobseeker.jobs') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control"
                        style="border-radius: 8px; border: 1px solid #c7d7f5;"
                        placeholder="Job title or keyword..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="location" class="form-control"
                        style="border-radius: 8px; border: 1px solid #c7d7f5;"
                        placeholder="Location..." value="{{ request('location') }}">
                </div>
                <div class="col-md-3">
                    <select name="job_type" class="form-select"
                        style="border-radius: 8px; border: 1px solid #c7d7f5;">
                        <option value="">All Types</option>
                        <option value="full-time"   {{ request('job_type') == 'full-time'   ? 'selected' : '' }}>Full Time</option>
                        <option value="part-time"   {{ request('job_type') == 'part-time'   ? 'selected' : '' }}>Part Time</option>
                        <option value="contract"    {{ request('job_type') == 'contract'    ? 'selected' : '' }}>Contract</option>
                        <option value="internship"  {{ request('job_type') == 'internship'  ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn text-white w-100"
                        style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Jobs List --}}
@if($jobs->isEmpty())
    <div class="card shadow" style="border-radius: 15px; border: none;">
        <div class="card-body text-center py-5" style="background: #f8faff;">
            <div style="font-size: 3rem; color: #c7d7f5;">
                <i class="fas fa-search"></i>
            </div>
            <p class="mt-3 text-muted">Koi job nahi mili!</p>
        </div>
    </div>
@else
    @foreach($jobs as $job)
    <div class="card shadow mb-3" style="border-radius: 15px; border: none;">
        <div class="card-body" style="background: #f8faff;">
            <div class="row align-items-center">

                {{-- Job Icon --}}
                <div class="col-auto">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>

                {{-- Job Info --}}
                <div class="col-md-8">
                    <h5 class="mb-1" style="color: #1a3c6e;">{{ $job->title }}</h5>
                    <p class="text-muted mb-1" style="font-size: 0.9rem;">
                        <i class="fas fa-building me-1"></i> {{ $job->company->company_name ?? 'N/A' }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-map-marker-alt me-1"></i> {{ $job->location ?? 'N/A' }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-money-bill me-1"></i> {{ $job->salary ?? 'N/A' }}
                    </p>
                    <span class="badge" style="background: #eff6ff; color: #1a3c6e;">
                        {{ $job->job_type }}
                    </span>
                </div>

                {{-- Apply Button --}}
                <div class="col-md-2 text-end">
                    <a href="{{ route('jobs.show', $job->id) }}"
                        class="btn btn-sm text-white"
                        style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px; padding: 8px 16px;">
                        <i class="fas fa-eye me-1"></i> View & Apply
                    </a>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $jobs->links() }}
    </div>
@endif

@endsection