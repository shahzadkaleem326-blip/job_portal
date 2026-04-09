@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4><i class="fas fa-upload"></i> Upload Resume</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('jobseeker.resume') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Resume File (PDF, DOC, DOCX)</label>
                        <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Upload Resume</button>
                    </div>
                </form>

                @if($resumes->count() > 0)
                <hr>
                <h5 class="mt-3">My Uploaded Resumes:</h5>
                <table class="table table-bordered mt-2">
                    <thead class="table-dark">
                        <tr>
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
                            <td>{{ $resume->original_name }}</td>
                            <td>{{ $resume->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ asset('resumes/' . $resume->file_path) }}"
                                    class="btn btn-sm btn-dark" target="_blank">
                                    <i class="fas fa-download"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection