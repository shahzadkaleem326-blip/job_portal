@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="page-title mb-0"><i class="fas fa-users me-2"></i>Manage Users</h2>
        <p class="text-muted mb-0">Total: {{ $users->total() }} users</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i> Back
    </a>
</div>

<div class="card">
    <div class="card-header" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); color: white;">
        <i class="fas fa-list me-2"></i>All Users
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin-right: 10px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge bg-danger">Admin</span>
                            @elseif($user->role === 'employer')
                                <span class="badge bg-success">Employer</span>
                            @else
                                <span class="badge" style="background: #1a3c6e;">Job Seeker</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            @if($user->role !== 'admin')
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                onsubmit="return confirm('Delete karna chahte hain?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection