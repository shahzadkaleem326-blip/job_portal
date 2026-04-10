@extends('layouts.app')

@section('content')

{{-- Page Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0">
            <i class="fas fa-file-alt me-2"></i> Manage Applications
        </h2>
        <p class="text-muted mb-0">Total: {{ $applications->total() }} applications</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
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
                <p class="mt-3 text-muted">Koi application nahi mili!</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr style="background: #eff6ff; color: #1a3c6e;">
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

                            {{-- Applicant --}}
                            <td>
                                <div class="d-flex align-items-center">
                                    <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; margin-right: 10px; font-size: 0.8rem;">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <strong>{{ $app->user->name }}</strong>
                                </div>
                            </td>

                            {{-- Job Title -- BUG FIX: $app not $application --}}
                            <td>{{ $app->jobListing->title ?? 'N/A' }}</td>

                            {{-- Company -- BUG FIX: $app not $application --}}
                            <td>{{ $app->jobListing->company->company_name ?? 'N/A' }}</td>

                            {{-- Status --}}
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

                            {{-- Applied On --}}
                            <td>
                                <i class="fas fa-calendar-alt me-1" style="color: #2563eb;"></i>
                                {{ $app->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="p-3">
                {{ $applications->links() }}
            </div>
        @endif
    </div>
</div>

@endsection