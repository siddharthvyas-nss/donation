<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonorController;

Route::get('/', function () {
    return redirect()->route('volunteer.login');
});

// Volunteer Module Routes
Route::prefix('volunteer')->name('volunteer.')->group(function () {
    // Public routes (no authentication required)
    Route::get('/register', [VolunteerController::class, 'showRegister'])->name('register');
    Route::post('/register', [VolunteerController::class, 'register'])->name('register.post');
    Route::get('/login', [VolunteerController::class, 'showLogin'])->name('login');
    Route::post('/login', [VolunteerController::class, 'login'])->name('login.post');
    Route::get('/login/otp', [VolunteerController::class, 'showLoginOtp'])->name('login.otp');
    Route::post('/login/otp', [VolunteerController::class, 'loginOtp'])->name('login.otp.post');
    Route::post('/login/send-otp', [VolunteerController::class, 'sendLoginOtp'])->name('login.send-otp');
    
    // OTP verification routes
    Route::get('/verify/mobile', [VolunteerController::class, 'showMobileVerification'])->name('verify.mobile');
    Route::post('/verify/mobile', [VolunteerController::class, 'verifyMobile'])->name('verify.mobile.post');
    Route::get('/verify/email', [VolunteerController::class, 'showEmailVerification'])->name('verify.email');
    Route::post('/verify/email', [VolunteerController::class, 'verifyEmail'])->name('verify.email.post');
    Route::post('/resend/otp', [VolunteerController::class, 'resendOtp'])->name('resend.otp');
    
    // Protected routes (authentication required)
    Route::middleware('volunteer.auth')->group(function () {
        Route::get('/dashboard', [VolunteerController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [VolunteerController::class, 'profile'])->name('profile');
        Route::post('/profile', [VolunteerController::class, 'updateProfile'])->name('profile.update');
        Route::post('/logout', [VolunteerController::class, 'logout'])->name('logout');
    });
});

// Donor Module Routes
Route::prefix('donor')->name('donor.')->middleware('volunteer.auth')->group(function () {
    Route::get('/add', [DonorController::class, 'showAdd'])->name('add');
    Route::post('/add', [DonorController::class, 'store'])->name('store');
    Route::get('/list', [DonorController::class, 'index'])->name('list');
    Route::get('/reports', [DonorController::class, 'reports'])->name('reports');
    Route::get('/trash', [DonorController::class, 'trash'])->name('trash');
});
