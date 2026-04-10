@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-building me-2"></i>Manage Companies</h2>
        <p class="text-muted mb-0">Total: {{ $companies->total() }} companies</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
        <i class="fas fa-list me-2"></i>All Companies
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Owner</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #065f46, #10b981); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; margin-right: 10px;">
                                    <i class="fas fa-building" style="font-size: 0.8rem;"></i>
                                </div>
                                <strong>{{ $company->company_name }}</strong>
                            </div>
                        </td>
                        <td>{{ optional($company->user)->name ?? 'N/A' }}</td>
                        <td>
                            @if($company->location)
                                <i class="fas fa-map-marker-alt text-danger me-1"></i>{{ $company->location }}
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ $company->phone ?? 'N/A' }}</td>
                        <td>
                            <form action="{{ route('admin.company.delete', $company->id) }}" method="POST"
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
            {{ $companies->links() }}
        </div>
    </div>
</div>
@endsection