{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPortal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0f2557, #1a3c6e, #2563eb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-card {
            background: rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 50px;
            text-align: center;
        }
        .role-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }
        .role-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .role-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: white;
        }
        .admin-icon    { background: linear-gradient(135deg, #1a3c6e, #2563eb); }
        .employer-icon { background: linear-gradient(135deg, #065f46, #10b981); }
        .jobseeker-icon{ background: linear-gradient(135deg, #92400e, #f59e0b); }
        .role-card h4  { color: #1a3c6e; font-weight: 700; }
        .role-card p   { color: #6b7280; font-size: 0.9rem; }
        .role-card .btn-enter {
            margin-top: 15px;
            padding: 10px 30px;
            border-radius: 10px;
            font-weight: 600;
            color: white;
            border: none;
        }
        .admin-btn    { background: linear-gradient(135deg, #1a3c6e, #2563eb); }
        .employer-btn { background: linear-gradient(135deg, #065f46, #10b981); }
        .jobseeker-btn{ background: linear-gradient(135deg, #92400e, #f59e0b); }
    </style>
</head>
<body>

<div class="container">
    <div class="main-card">

        {{-- Logo & Title --}}
        <div class="mb-5">
            <h1 class="text-white fw-bold">
                <i class="fas fa-briefcase me-2"></i> JobPortal
            </h1>
            <p class="text-white-50">Apna role select karein</p>
        </div>

        {{-- 3 Cards --}}
        <div class="row g-4 justify-content-center">

            {{-- Admin --}}
            <div class="col-md-4">
                <a href="{{ route('admin.dashboard') }}" class="role-card">
                    <div class="role-icon admin-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <h4>Admin</h4>
                    <p>Poore system ko manage karo — users, companies, jobs aur applications</p>
                    <button class="btn btn-enter admin-btn">
                        <i class="fas fa-arrow-right me-2"></i> Admin Panel
                    </button>
                </a>
            </div>

            {{-- Employer --}}
            <div class="col-md-4">
                <a href="{{ route('employer.dashboard') }}" class="role-card">
                    <div class="role-icon employer-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Employer</h4>
                    <p>Jobs post karo, applications dekho aur company profile manage karo</p>
                    <button class="btn btn-enter employer-btn">
                        <i class="fas fa-arrow-right me-2"></i> Employer Panel
                    </button>
                </a>
            </div>

            {{-- Jobseeker --}}
            <div class="col-md-4">
                <a href="{{ route('jobseeker.dashboard') }}" class="role-card">
                    <div class="role-icon jobseeker-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Jobseeker</h4>
                    <p>Jobs dhundo, apply karo aur apna resume upload karo</p>
                    <button class="btn btn-enter jobseeker-btn">
                        <i class="fas fa-arrow-right me-2"></i> Jobseeker Panel
                    </button>
                </a>
            </div>

        </div>

        {{-- Footer --}}
        <div class="mt-5">
            <p class="text-white-50 mb-0">
                JobPortal © 2026 — Developed by Shahzad Kaleem | BS(IT) 2022-2026
            </p>
        </div>

    </div>
</div>

</body>
</html>