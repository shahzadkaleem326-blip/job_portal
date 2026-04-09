@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="text-center mb-4">
            <i class="fas fa-key" style="font-size: 3rem; color: #1a1a2e;"></i>
            <h2 class="mt-2 fw-bold">Reset Password</h2>
            <p class="text-muted">Enter your email and new password</p>
        </div>

        <div class="card shadow-lg border-0" style="border-radius: 15px;">
            <div class="card-body p-5">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('forgot.password.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control form-control-lg"
                                placeholder="Enter new password" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                placeholder="Confirm new password" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-lg" style="border-radius: 10px;">
                            <i class="fas fa-key"></i> Reset Password
                        </button>
                    </div>
                </form>

                <hr class="my-4">
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-dark fw-bold">
                        <i class="fas fa-arrow-left"></i> Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection