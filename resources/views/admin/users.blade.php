@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-users"></i> Manage Users</h2>
        <hr>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">All Users</h5>
    </div>
    <div class="card-body">
        @if($users->isEmpty())
            <p class="text-center">Koi user nahi mila!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge bg-danger">Admin</span>
                            @elseif($user->role === 'employer')
                                <span class="badge bg-success">Employer</span>
                            @else
                                <span class="badge bg-dark">Job Seeker</span>
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
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $users->links() }}
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