@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-building"></i> Manage Companies</h2>
        <hr>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">All Companies</h5>
    </div>
    <div class="card-body">
        @if($companies->isEmpty())
            <p class="text-center">Koi company nahi mili!</p>
        @else
            <table class="table table-bordered">
                <thead class="table-dark">
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
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->user->name }}</td>
                        <td>{{ $company->location }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>
                            <form action="{{ route('admin.company.delete', $company->id) }}" method="POST"
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
                {{ $companies->links() }}
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