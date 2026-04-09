@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-10">
        <div class="card overflow-hidden" style="border-radius: 20px;">
            <div class="row g-0">
                {{-- Left Side --}}
                <div class="col-md-5 d-none d-md-block" style="background: linear-gradient(135deg, #1a3c6e, #2563eb); padding: 50px 40px; color: white;">
                    <div class="text-center mt-4">
                        <i class="fas fa-briefcase" style="font-size: 4rem; opacity: 0.9;"></i>
                        <h2 class="mt-3 fw-bold">JobPortal</h2>
                        <p style="opacity: 0.85; margin-top: 10px;">Your gateway to thousands of job opportunities!</p>
                    </div>
                    <div class="mt-5">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Search thousands of jobs</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Apply with one click</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Track your applications</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-3" style="font-size: 1.2rem; color: #93c5fd;"></i>
                            <span>Upload your resume</span>
                        </div>
                    </div>
                </div>

                {{-- Right Side --}}
                <div class="col-md-7">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-1" style="color: #1a3c6e;">Welcome Back! 👋</h3>
                        <p class="text-muted mb-4">Please login to your account</p>

                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
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
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter your password" required>
                                    <span class="input-group-text" style="cursor:pointer; border-color: #e2e8f0;"
                                        onclick="togglePassword()">
                                        <i class="fas fa-eye" id="eyeIcon" style="color: #2563eb;"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <div></div>
                                <a href="{{ route('forgot.password') }}" style="color: #2563eb; font-size: 0.9rem;">
                                    Forgot Password?
                                </a>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login
                                </button>
                            </div>
                        </form>

                        <hr class="my-4">
                        <div class="text-center">
                            <p class="text-muted">Don't have an account?
                                <a href="{{ route('register') }}" style="color: #2563eb; font-weight: 600;">
                                    Register Now
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    var field = document.getElementById('password');
    var icon = document.getElementById('eyeIcon');
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection