@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4><i class="fas fa-building"></i> Company Profile</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('employer.company.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" class="form-control"
                            value="{{ old('company_name', optional($company)->company_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', optional($company)->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control"
                            value="{{ old('location', optional($company)->location) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control"
                            value="{{ old('website', optional($company)->website) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', optional($company)->phone) }}">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Save Company Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection