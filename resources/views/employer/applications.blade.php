@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-file-alt"></i> Applications for: {{ $job->title }}</h2>
        <hr>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">All Applications</h5>
    </div>
    <div class="card-body">
        @if($applications->isEmpty())
            <p class="text-center">Abhi tak koi application nahi aayi!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Cover Letter</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $key => $app)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $app->user->name }}</td>
                        <td>{{ $app->user->email }}</td>
                        <td>{{ Str::limit($app->cover_letter, 50) }}</td>
                        <td>
                            @if($app->status === 'accepted')
                                <span class="badge bg-success">Accepted</span>
                            @elseif($app->status === 'rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('employer.application.status', $app->id) }}" method="POST">
                                @csrf
                                <select name="status" class="form-select form-select-sm d-inline w-auto">
                                    <option value="pending" {{ $app->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ $app->status === 'accepted' ? 'selected' : '' }}>Accept</option>
                                    <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                </select>
                                <button type="submit" class="btn btn-dark btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('employer.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>
</div>
@endsection