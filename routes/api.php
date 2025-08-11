<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VolunteerApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Volunteer API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // Test route
    Route::get('/test', function () {
        return response()->json([
            'status' => 'success',
            'message' => 'API is working!',
            'timestamp' => now()
        ]);
    });

    // Volunteer routes
    Route::prefix('volunteers')->group(function () {
        Route::post('/', [VolunteerApiController::class, 'store']); // Add volunteer
        Route::get('/', [VolunteerApiController::class, 'index']); // Get all volunteers
        Route::get('/{id}', [VolunteerApiController::class, 'show']); // Get volunteer details
        
        // Test route for debugging
        Route::post('/test-request', [VolunteerApiController::class, 'testRequest']); // Test request data
        
        // Mobile OTP routes
        Route::post('/send-mobile-otp', [VolunteerApiController::class, 'sendMobileOtp']); // Send mobile OTP
        Route::post('/verify-mobile-otp', [VolunteerApiController::class, 'verifyMobileOtp']); // Verify mobile OTP

        // Email OTP routes
        Route::post('/send-email-otp', [VolunteerApiController::class, 'sendEmailOtp']); // Send email OTP
        Route::post('/verify-email-otp', [VolunteerApiController::class, 'verifyEmailOtp']); // Verify email OTP
    });

    // Donor routes
    Route::post('/donors', [\App\Http\Controllers\Api\DonorApiController::class, 'store']); // Register donor
    Route::post('/donors/update', [\App\Http\Controllers\Api\DonorApiController::class, 'update']); // Update donor (POST, id in body)
    Route::get('/donors', [\App\Http\Controllers\Api\DonorApiController::class, 'index']); // List all donors
    Route::get('/donors/{id}', [\App\Http\Controllers\Api\DonorApiController::class, 'show']); // Show single donor
    Route::post('/donors/delete', [\App\Http\Controllers\Api\DonorApiController::class, 'destroy']); // Soft delete donor (POST, id in body)
}); 