@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-tachometer-alt"></i> Job Seeker Dashboard</h2>
        <hr>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-dark text-white text-center p-3">
            <h3>{{ $applications->count() }}</h3>
            <p>Total Applications</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white text-center p-3">
            <h3>{{ $applications->where('status', 'accepted')->count() }}</h3>
            <p>Accepted</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning text-white text-center p-3">
            <h3>{{ $applications->where('status', 'pending')->count() }}</h3>
            <p>Pending</p>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <a href="{{ route('jobs.index') }}" class="btn btn-dark">
            <i class="fas fa-search"></i> Search Jobs
        </a>
        <a href="{{ route('jobseeker.resume') }}" class="btn btn-secondary ms-2">
            <i class="fas fa-upload"></i> Upload Resume
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">My Applications</h5>
    </div>
    <div class="card-body">
        @if($applications->isEmpty())
            <p class="text-center">Abhi tak koi application nahi ki!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
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
                        <td>{{ $app->jobListing->title }}</td>
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
        @endif
    </div>
</div>
@endsection