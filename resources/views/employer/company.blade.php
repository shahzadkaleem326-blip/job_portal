@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow" style="border-radius: 15px; overflow: hidden; border: none;">

            {{-- Card Header --}}
            <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
                <h4 class="mb-0"><i class="fas fa-building me-2"></i> Company Profile</h4>
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

                <form action="{{ route('employer.company.store') }}" method="POST">
                    @csrf

                    {{-- Company Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-building me-1"></i> Company Name
                        </label>
                        <input type="text" name="company_name" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('company_name', optional($company)->company_name) }}"
                            placeholder="e.g. Tech Solutions Pvt Ltd" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-align-left me-1"></i> Description
                        </label>
                        <textarea name="description" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            rows="4"
                            placeholder="Describe your company...">{{ old('description', optional($company)->description) }}</textarea>
                    </div>

                    {{-- Location --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-map-marker-alt me-1"></i> Location
                        </label>
                        <input type="text" name="location" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('location', optional($company)->location) }}"
                            placeholder="e.g. Lahore, Pakistan">
                    </div>

                    {{-- Website --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-globe me-1"></i> Website
                        </label>
                        <input type="text" name="website" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('website', optional($company)->website) }}"
                            placeholder="e.g. https://yourcompany.com">
                    </div>

                    {{-- Phone --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-phone me-1"></i> Phone
                        </label>
                        <input type="text" name="phone" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            value="{{ old('phone', optional($company)->phone) }}"
                            placeholder="e.g. +92 300 1234567">
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-semibold"
                            style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px; padding: 12px; font-size: 1rem;">
                            <i class="fas fa-save me-2"></i> Save Company Profile
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection