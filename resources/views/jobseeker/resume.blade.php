@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Page Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="page-title mb-0">
                    <i class="fas fa-upload me-2"></i> Upload Resume
                </h2>
                <p class="text-muted mb-0">Apna CV upload karein</p>
            </div>
            <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
            </a>
        </div>

        {{-- Upload Card --}}
        <div class="card shadow mb-4" style="border-radius: 15px; overflow: hidden; border: none;">
            <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
                <h4 class="mb-0"><i class="fas fa-upload me-2"></i> Upload Resume</h4>
            </div>
            <div class="card-body" style="background: #f8faff; padding: 2rem;">

                {{-- Success --}}
                @if(session('success'))
                    <div class="alert alert-success" style="border-radius: 10px;">
                        <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger" style="border-radius: 10px;">
                        @foreach($errors->all() as $error)
                            <p class="mb-0"><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{-- Upload Form --}}
                <form action="{{ route('jobseeker.resume') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold" style="color: #1a3c6e;">
                            <i class="fas fa-file-pdf me-1"></i> Resume File (PDF, DOC, DOCX)
                        </label>
                        <input type="file" name="resume" class="form-control"
                            style="border-radius: 8px; border: 1px solid #c7d7f5;"
                            accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn text-white fw-semibold"
                            style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px; padding: 12px; font-size: 1rem;">
                            <i class="fas fa-cloud-upload-alt me-2"></i> Upload Resume
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Uploaded Resumes Table --}}
        @if($resumes->count() > 0)
        <div class="card shadow" style="border-radius: 15px; overflow: hidden; border: none;">
            <div class="card-header text-white" style="background: linear-gradient(135deg, #1a3c6e, #2563eb);">
                <h5 class="mb-0"><i class="fas fa-folder-open me-2"></i> My Uploaded Resumes</h5>
            </div>
            <div class="card-body p-0" style="background: #f8faff;">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr style="background: #eff6ff; color: #1a3c6e;">
                                <th>#</th>
                                <th>File Name</th>
                                <th>Uploaded On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resumes as $key => $resume)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                {{-- File Name --}}
                                <td>
                                    <i class="fas fa-file-alt me-1" style="color: #2563eb;"></i>
                                    {{ $resume->original_name }}
                                </td>

                                {{-- Uploaded On --}}
                                <td>
                                    <i class="fas fa-calendar-alt me-1" style="color: #2563eb;"></i>
                                    {{ $resume->created_at->format('d M Y') }}
                                </td>

                                {{-- Action --}}
                                <td>
                                    <a href="{{ asset('resumes/' . $resume->file_path) }}"
                                        class="btn btn-sm text-white"
                                        style="background: linear-gradient(135deg, #1a3c6e, #2563eb); border-radius: 8px;"
                                        target="_blank">
                                        <i class="fas fa-eye me-1"></i> View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection