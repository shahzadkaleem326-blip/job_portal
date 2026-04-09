{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; font-size: 1.5rem; }
        .sidebar { min-height: 100vh; background-color: #343a40; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 15px; }
        .sidebar a:hover { background-color: #495057; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-briefcase"></i> Job Portal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.index') }}">Jobs</a>
                </li>
                @auth
                    @if(auth()->user()->role === 'jobseeker')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobseeker.dashboard') }}">Dashboard</a>
                        </li>
                    @elseif(auth()->user()->role === 'employer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employer.dashboard') }}">Dashboard</a>
                        </li>
                    @elseif(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm mt-1">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background-color: #f0f4f8; }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #1a3c6e, #2563eb) !important;
            box-shadow: 0 2px 15px rgba(0,0,0,0.2);
            padding: 12px 0;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white !important;
            letter-spacing: 1px;
        }
        .navbar-brand i { color: #93c5fd; }
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            transition: all 0.3s;
            padding: 8px 15px !important;
            border-radius: 8px;
        }
        .nav-link:hover {
            color: white !important;
            background: rgba(255,255,255,0.15);
        }
        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white !important;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 6px 20px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: white;
            color: #1a3c6e !important;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }
        .card:hover { transform: translateY(-3px); }
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, #1a3c6e, #2563eb);
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb, #1a3c6e);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37,99,235,0.4);
        }
        .btn-dark {
            background: linear-gradient(135deg, #1a3c6e, #2563eb);
            border: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-dark:hover {
            background: linear-gradient(135deg, #2563eb, #1a3c6e);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37,99,235,0.4);
        }
        .btn-secondary {
            border-radius: 10px;
            font-weight: 500;
        }

        /* Stats Cards */
        .stat-card {
            border-radius: 15px;
            padding: 25px;
            color: white;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .stat-card h3 { font-size: 2.5rem; font-weight: 700; margin: 0; }
        .stat-card p { margin: 5px 0 0; opacity: 0.9; font-size: 0.9rem; }
        .stat-blue { background: linear-gradient(135deg, #1a3c6e, #2563eb); }
        .stat-green { background: linear-gradient(135deg, #065f46, #10b981); }
        .stat-orange { background: linear-gradient(135deg, #92400e, #f59e0b); }
        .stat-red { background: linear-gradient(135deg, #7f1d1d, #ef4444); }

        /* Tables */
        .table { border-radius: 10px; overflow: hidden; }
        .table thead th {
            background: linear-gradient(135deg, #1a3c6e, #2563eb);
            color: white;
            font-weight: 600;
            border: none;
            padding: 12px 15px;
        }
        .table tbody tr:hover { background: #eff6ff; }
        .table tbody td { padding: 12px 15px; vertical-align: middle; }

        /* Badges */
        .badge { padding: 6px 12px; border-radius: 20px; font-weight: 500; }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.15);
        }
        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 1.5px solid #e2e8f0;
        }

        /* Alerts */
        .alert { border-radius: 12px; border: none; font-weight: 500; }
        .alert-success { background: #ecfdf5; color: #065f46; }
        .alert-danger { background: #fef2f2; color: #7f1d1d; }
        .alert-warning { background: #fffbeb; color: #92400e; }

        /* Page Title */
        .page-title {
            color: #1a3c6e;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #1a3c6e, #2563eb);
            color: white;
            padding: 20px 0;
            margin-top: 50px;
            text-align: center;
        }
        .footer p { margin: 0; opacity: 0.9; font-size: 0.9rem; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-briefcase me-2"></i>JobPortal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.index') }}">
                        <i class="fas fa-search me-1"></i> Find Jobs
                    </a>
                </li>
                @auth
                    @if(auth()->user()->role === 'jobseeker')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobseeker.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                            </a>
                        </li>
                    @elseif(auth()->user()->role === 'employer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employer.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                            </a>
                        </li>
                    @elseif(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                            </a>
                        </li>
                    @endif
                    <li class="nav-item ms-2">
                        <span class="nav-link">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-logout">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('register') }}" class="btn btn-logout">
                            <i class="fas fa-user-plus me-1"></i> Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 mb-5">
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>

<div class="footer">
    <div class="container">
        <p><i class="fas fa-briefcase me-2"></i>JobPortal &copy; {{ date('Y') }} — All Rights Reserved</p>
        <p class="mt-1" style="font-size: 0.8rem; opacity: 0.7;">Developed by Shahzad Kaleem | BS(IT) 2022-2026</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>