@extends('layouts.app')

@section('content')
<div class="row g-4">
    {{-- Job Detail --}}
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white; padding: 20px 25px;">
                <h4 class="mb-1">{{ $job->title }}</h4>
                <p class="mb-0" style="opacity: 0.85;">
                    <i class="fas fa-building me-1"></i> {{ $job->company->company_name }}
                </p>
            </div>
            <div class="card-body p-4">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background: #eff6ff; border-radius: 12px;">
                            <i class="fas fa-map-marker-alt text-danger me-3" style="font-size: 1.3rem;"></i>
                            <div>
                                <small class="text-muted">Location</small>
                                <p class="mb-0 fw-bold">{{ $job->location ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background: #f0fdf4; border-radius: 12px;">
                            <i class="fas fa-money-bill text-success me-3" style="font-size: 1.3rem;"></i>
                            <div>
                                <small class="text-muted">Salary</small>
                                <p class="mb-0 fw-bold">{{ $job->salary ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background: #fefce8; border-radius: 12px;">
                            <i class="fas fa-briefcase text-warning me-3" style="font-size: 1.3rem;"></i>
                            <div>
                                <small class="text-muted">Job Type</small>
                                <p class="mb-0 fw-bold">{{ $job->job_type }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center p-3" style="background: #fef2f2; border-radius: 12px;">
                            <i class="fas fa-calendar text-danger me-3" style="font-size: 1.3rem;"></i>
                            <div>
                                <small class="text-muted">Deadline</small>
                                <p class="mb-0 fw-bold">{{ $job->deadline ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold mb-3" style="color: #1a3c6e;">
                    <i class="fas fa-align-left me-2"></i>Job Description
                </h5>
                <p class="text-muted" style="line-height: 1.8;">{{ $job->description }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('jobs.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Jobs
            </a>
        </div>
    </div>

    {{-- Apply Section --}}
    <div class="col-md-4">
        <div class="card">
            <div class="card-header" style="background: linear-gradient(135deg, #065f46, #10b981); color: white;">
                <h5 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Apply For This Job</h5>
            </div>
            <div class="card-body p-4">
                @auth
                    @if(auth()->user()->role === 'jobseeker')
                        <form action="{{ route('jobseeker.apply', $job->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #1a3c6e;">Cover Letter</label>
                                <textarea name="cover_letter" class="form-control" rows="6"
                                    placeholder="Write about yourself and why you are suitable for this job..."></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg" style="background: linear-gradient(135deg, #065f46, #10b981); color: white; border-radius: 10px;">
                                    <i class="fas fa-paper-plane me-2"></i> Apply Now
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center p-3">
                            <i class="fas fa-exclamation-circle text-warning" style="font-size: 2rem;"></i>
                            <p class="mt-2 text-muted">Sirf Job Seekers apply kar sakte hain!</p>
                        </div>
                    @endif
                @else
                    <div class="text-center p-3">
                        <i class="fas fa-lock text-primary" style="font-size: 2rem;"></i>
                        <p class="mt-2 text-muted">Apply karne ke liye login karo!</p>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">
                            <i class="fas fa-sign-in-alt me-2"></i> Login Now
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        {{-- Company Info --}}
        <div class="card mt-3">
            <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
                <h6 class="mb-0"><i class="fas fa-building me-2"></i>Company Info</h6>
            </div>
            <div class="card-body">
                <h6 class="fw-bold">{{ $job->company->company_name }}</h6>
                @if($job->company->location)
                    <p class="text-muted mb-1">
                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>{{ $job->company->location }}
                    </p>
                @endif
                @if($job->company->website)
                    <p class="text-muted mb-1">
                        <i class="fas fa-globe me-2 text-primary"></i>{{ $job->company->website }}
                    </p>
                @endif
                @if($job->company->phone)
                    <p class="text-muted mb-0">
                        <i class="fas fa-phone me-2 text-success"></i>{{ $job->company->phone }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection