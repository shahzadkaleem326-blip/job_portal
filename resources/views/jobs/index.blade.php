@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-briefcase"></i> All Jobs</h2>
        <hr>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('jobs.search') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control"
                        placeholder="Job title..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="location" class="form-control"
                        placeholder="Location..." value="{{ request('location') }}">
                </div>
                <div class="col-md-3">
                    <select name="job_type" class="form-select">
                        <option value="">All Types</option>
                        <option value="full-time">Full Time</option>
                        <option value="part-time">Part Time</option>
                        <option value="contract">Contract</option>
                        <option value="internship">Internship</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-dark w-100">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($jobs->isEmpty())
    <div class="alert alert-info text-center">Koi job nahi mili!</div>
@else
    @foreach($jobs as $job)
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <h5>{{ $job->title }}</h5>
                    <p class="text-muted mb-1">
                        <i class="fas fa-building"></i> {{ $job->company->company_name }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-map-marker-alt"></i> {{ $job->location }}
                        &nbsp;|&nbsp;
                        <i class="fas fa-money-bill"></i> {{ $job->salary }}
                    </p>
                    <span class="badge bg-dark">{{ $job->job_type }}</span>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-dark btn-sm">
                        View Details
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