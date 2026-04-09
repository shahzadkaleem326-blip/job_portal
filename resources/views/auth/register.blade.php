@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <div class="card overflow-hidden" style="border-radius: 20px;">
            <div class="row g-0">
                {{-- Left Side --}}
                <div class="col-md-5 d-none d-md-block" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); padding: 50px 40px; color: white;">
                    <div class="text-center mt-4">
                        <i class="fas fa-user-plus" style="font-size: 4rem; opacity: 0.9;"></i>
                        <h2 class="mt-3 fw-bold">Join Us Today!</h2>
                        <p style="opacity: 0.85; margin-top: 10px;">Create your account and start your journey!</p>
                    </div>
                    <div class="mt-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user-tie me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Register as Job Seeker</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-building me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Register as Employer</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-shield-alt me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>100% Secure & Free</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-rocket me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Get started in minutes</span>
                        </div>
                    </div>
                </div>

                {{-- Right Side --}}
                <div class="col-md-7">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-1" style="color: #1a3c6e;">Create Account 🚀</h3>
                        <p class="text-muted mb-4">Fill in the details to get started</p>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-600" style="color: #1a3c6e;">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #eff6ff; border-color: #e2e8f0;">
                                        <i class="fas fa-user" style="color: #2563eb;"></i>
                                    </span>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter your full name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-600" style="color: #1a3c6e;">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #eff6ff; border-color: #e2e8f0;">
                                        <i class="fas fa-envelope" style="color: #2563eb;"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Enter your email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-600" style="color: #1a3c6e;">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #eff6ff; border-color: #e2e8f0;">
                                        <i class="fas fa-lock" style="color: #2563eb;"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Min 6 characters" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-600" style="color: #1a3c6e;">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #eff6ff; border-color: #e2e8f0;">
                                        <i class="fas fa-lock" style="color: #2563eb;"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        placeholder="Confirm your password" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-600" style="color: #1a3c6e;">Register As</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="role" id="jobseeker" value="jobseeker" required>
                                        <label class="btn btn-outline-primary w-100" for="jobseeker">
                                            <i class="fas fa-user-tie me-2"></i>Job Seeker
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="role" id="employer" value="employer">
                                        <label class="btn btn-outline-primary w-100" for="employer">
                                            <i class="fas fa-building me-2"></i>Employer
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-user-plus me-2"></i> Create Account
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">
                        <div class="text-center">
                            <p class="text-muted">Already have an account?
                                <a href="{{ route('login') }}" style="color: #2563eb; font-weight: 600;">
                                    Login Now
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection