@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4><i class="fas fa-plus"></i> Post New Job</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('employer.job.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" 
                            rows="5" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control"
                            value="{{ old('location') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salary</label>
                        <input type="text" name="salary" class="form-control"
                            value="{{ old('salary') }}" placeholder="e.g. 50,000 PKR">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Type</label>
                        <select name="job_type" class="form-select" required>
                            <option value="">-- Select Type --</option>
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline" class="form-control"
                            value="{{ old('deadline') }}">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Post Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection