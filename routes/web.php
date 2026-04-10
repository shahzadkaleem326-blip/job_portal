<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;

// Home Page
// Route::get('/', function () {
//     return redirect()->route('login');
// });// Home Page
use App\Models\JobListing;
use App\Models\Company;
use App\Models\User;
  
Route::get('/', function () {
    $totalJobs = JobListing::where('status', 'active')->count();
    $totalCompanies = Company::count();
    $totalUsers = User::count();
    $latestJobs = JobListing::with('company')
        ->where('status', 'active')
        ->latest()
        ->take(5)
        ->get();
    return view('home', compact('totalJobs', 'totalCompanies', 'totalUsers', 'latestJobs'));
})->name('home');

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Jobs Public Routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Job Seeker Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/jobseeker/dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');
    Route::get('/jobseeker/jobs', [JobSeekerController::class, 'searchJobs'])->name('jobseeker.jobs');
    Route::post('/jobseeker/apply/{id}', [JobSeekerController::class, 'applyJob'])->name('jobseeker.apply');
    Route::post('/jobseeker/resume', [JobSeekerController::class, 'uploadResume'])->name('jobseeker.resume');
    Route::get('/jobseeker/resume', [JobSeekerController::class, 'resumePage'])->name('jobseeker.resume.page');
});

// Employer Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    Route::get('/employer/company', [EmployerController::class, 'createCompany'])->name('employer.company');
    Route::post('/employer/company', [EmployerController::class, 'storeCompany'])->name('employer.company.store');
    Route::get('/employer/job/create', [EmployerController::class, 'createJob'])->name('employer.job.create');
    Route::post('/employer/job/create', [EmployerController::class, 'storeJob'])->name('employer.job.store');
    Route::get('/employer/applications/{jobId}', [EmployerController::class, 'viewApplications'])->name('employer.applications');
    Route::post('/employer/applications/{id}/status', [EmployerController::class, 'updateApplicationStatus'])->name('employer.application.status');
});

// Admin Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    Route::get('/admin/companies', [AdminController::class, 'companies'])->name('admin.companies');
    Route::delete('/admin/companies/{id}', [AdminController::class, 'deleteCompany'])->name('admin.company.delete');
    Route::get('/admin/jobs', [AdminController::class, 'jobs'])->name('admin.jobs');
    Route::delete('/admin/jobs/{id}', [AdminController::class, 'deleteJob'])->name('admin.job.delete');
    Route::get('/admin/applications', [AdminController::class, 'applications'])->name('admin.applications');

    Route::get('/admin/export/users', [AdminController::class, 'exportUsers'])->name('admin.export.users');
    Route::get('/admin/export/companies', [AdminController::class, 'exportCompanies'])->name('admin.export.companies');
    Route::get('/admin/export/jobs', [AdminController::class, 'exportJobs'])->name('admin.export.jobs');
    Route::get('/admin/export/applications', [AdminController::class, 'exportApplications'])->name('admin.export.applications');
});

