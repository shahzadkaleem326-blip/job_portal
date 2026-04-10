@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0">
            <i class="fas fa-file-alt me-2"></i> Applications for: {{ $job->title }}
        </h2>
        <p class="text-muted mb-0">Total: {{ $applications->count() }} applications</p>
    </div>
    <a href="{{ route('employer.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
    </a>
</div>

{{-- Applications Card --}}
<div class="card shadow" style="border-radius: 15px; overflow: hidden; border: none;">
    <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
        <h5 class="mb-0"><i class="fas fa-list me-2"></i> All Applications</h5>
    </div>
    <div class="card-body p-0" style="background: #f8faff;">

        @if($applications->isEmpty())
            {{-- Empty State --}}
            <div class="text-center py-5">
                <div style="font-size: 3rem; color: #c7d7f5;">
                    <i class="fas fa-inbox"></i>
                </div>
                <p class="mt-3 text-muted">Abhi tak koi application nahi aayi!</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #eff6ff; color: #1a3c6e;">
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

                            {{-- Applicant Name --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; margin-right: 10px; font-size: 0.8rem;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <strong>{{ $app->user->name }}</strong>
                                </div>
                            </td>

                            {{-- Email --}}
                            <td>
                                <i class="fas fa-envelope me-1" style="color: #2563eb;"></i>
                                {{ $app->user->email }}
                            </td>

                            {{-- Cover Letter --}}
                            <td>
                                <span class="text-muted">{{ Str::limit($app->cover_letter, 50) }}</span>
                            </td>

                            {{-- Status Badge --}}
                            <td>
                                @if($app->status === 'accepted')
                                    <span class="badge bg-success">
                                        <i class="fas fa-check me-1"></i> Accepted
                                    </span>
                                @elseif($app->status === 'rejected')
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times me-1"></i> Rejected
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-clock me-1"></i> Pending
                                    </span>
                                @endif
                            </td>

                            {{-- Action --}}
                            <td>
                                <form action="{{ route('employer.application.status', $app->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm"
                                        style="border-radius: 8px; border: 1px solid #c7d7f5; width: auto;">
                                        <option value="pending" {{ $app->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $app->status === 'accepted' ? 'selected' : '' }}>Accept</option>
                                        <option value="rejected" {{ $app->status === 'rejected' ? 'selected' : '' }}>Reject</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm text-white"
                                        style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px;">
                                        <i class="fas fa-sync-alt me-1"></i> Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection