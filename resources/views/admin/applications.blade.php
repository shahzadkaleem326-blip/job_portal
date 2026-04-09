@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-file-alt"></i> Manage Applications</h2>
        <hr>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">All Applications</h5>
    </div>
    <div class="card-body">
        @if($applications->isEmpty())
            <p class="text-center">Koi application nahi mili!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Applicant</th>
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
                        <td>{{ $app->user->name }}</td>
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
            <div class="mt-3">
                {{ $applications->links() }}
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