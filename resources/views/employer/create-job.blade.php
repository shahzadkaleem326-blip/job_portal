@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow" style="border-radius: 15px; overflow: hidden; border: none;">

            {{-- Card Header --}}
            <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
                <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Post New Job</h4>
            </div>

            <div class="card-body" style="background: #f8faff; padding: 2rem;">

                {{-- Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger" style="border-radius: 10px;">
                        @foreach($errors->all() as $error)
                            <p class="mb-0"><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('employer.job.store') }}" method="POST">
                    @csrf

                    {{-- Job Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-briefcase me-1"></i> Job Title
                        </label>
                        <input type="text" name="title" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('title') }}" placeholder="e.g. Laravel Developer" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-align-left me-1"></i> Description
                        </label>
                        <textarea name="description" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            rows="5" placeholder="Describe the job role..." required>{{ old('description') }}</textarea>
                    </div>

                    {{-- Location --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-map-marker-alt me-1"></i> Location
                        </label>
                        <input type="text" name="location" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('location') }}" placeholder="e.g. Lahore, Pakistan">
                    </div>

                    {{-- Salary --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-money-bill-wave me-1"></i> Salary
                        </label>
                        <input type="text" name="salary" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('salary') }}" placeholder="e.g. 50,000 PKR">
                    </div>

                    {{-- Job Type --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-tag me-1"></i> Job Type
                        </label>
                        <select name="job_type" class="form-select"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;" required>
                            <option value="">-- Select Type --</option>
                            <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                            <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ old('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                    </div>

                    {{-- Deadline --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-calendar-alt me-1"></i> Deadline
                        </label>
                        <input type="date" name="deadline" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('deadline') }}">
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-semibold"
                            style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px; padding: 12px; font-size: 1rem;">
                            <i class="fas fa-paper-plane me-2"></i> Post Job
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection