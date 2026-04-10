@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-briefcase me-2"></i>Manage Jobs</h2>
        <p class="text-muted mb-0">Total: {{ $jobs->total() }} jobs</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
        <i class="fas fa-list me-2"></i>All Jobs
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
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
                        <td>
                            <div class="d-flex align-items-center">
                                <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; margin-right: 10px;">
                                    <i class="fas fa-briefcase" style="font-size: 0.8rem;"></i>
                                </div>
                                <strong>{{ $job->title }}</strong>
                            </div>
                        </td>
                        <td>{{ $job->company->company_name ?? 'N/A' }}</td>                        <td>{{ $job->location ?? 'N/A' }}</td>
                        <td>
                            <span class="badge" style="background: #eff6ff; color: #1a3c6e;">{{ $job->job_type }}</span>
                        </td>
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
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
@endsection