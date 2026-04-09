@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4>{{ $job->title }}</h4>
            </div>
            <div class="card-body">
                <p><i class="fas fa-building"></i> <strong>Company:</strong> {{ $job->company->company_name }}</p>
                <p><i class="fas fa-map-marker-alt"></i> <strong>Location:</strong> {{ $job->location }}</p>
                <p><i class="fas fa-money-bill"></i> <strong>Salary:</strong> {{ $job->salary }}</p>
                <p><i class="fas fa-briefcase"></i> <strong>Job Type:</strong> {{ $job->job_type }}</p>
                <p><i class="fas fa-calendar"></i> <strong>Deadline:</strong> {{ $job->deadline }}</p>
                <hr>
                <h5>Job Description:</h5>
                <p>{{ $job->description }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h5>Apply For This Job</h5>
            </div>
            <div class="card-body">
                @auth
                    @if(auth()->user()->role === 'jobseeker')
                        <form action="{{ route('jobseeker.apply', $job->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Cover Letter</label>
                                <textarea name="cover_letter" class="form-control" rows="5" 
                                    placeholder="Apne baare mein likho..."></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Apply Now</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning">
                            Sirf Job Seekers apply kar sakte hain!
                        </div>
                    @endif
                @else
                    <div class="alert alert-info">
                        Apply karne ke liye 
                        <a href="{{ route('login') }}">Login</a> karo!
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Jobs
    </a>
</div>
@endsection