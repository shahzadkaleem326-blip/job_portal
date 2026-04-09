@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-briefcase"></i> Manage Jobs</h2>
        <hr>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">All Jobs</h5>
    </div>
    <div class="card-body">
        @if($jobs->isEmpty())
            <p class="text-center">Koi job nahi mili!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Company</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $key => $job)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->company->company_name }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ $job->job_type }}</td>
                        <td>
                            @if($job->status === 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Closed</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.job.delete', $job->id) }}" method="POST"
                                onsubmit="return confirm('Delete karna chahte hain?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
</div>
@endsection