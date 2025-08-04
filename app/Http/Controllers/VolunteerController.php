<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\VolunteerOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VolunteerController extends Controller
{
    /**
     * Show volunteer registration form
     */
    public function showRegister()
    {
        return view('volunteer.register');
    }

    /**
     * Handle volunteer registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:volunteers,mobile',
            'email' => 'required|email|unique:volunteers,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create volunteer
        $volunteer = Volunteer::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        // Generate and send OTPs
        $this->sendMobileOtp($volunteer);
        $this->sendEmailOtp($volunteer);

        return redirect()->route('volunteer.verify.mobile')
            ->with('success', 'Registration successful! Please verify your mobile number.')
            ->with('mobile', $request->mobile);
    }

    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('volunteer.login');
    }

    /**
     * Handle login with password
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('volunteer')->attempt($credentials)) {
            $volunteer = Auth::guard('volunteer')->user();
            $volunteer->updateLastLogin();
            
            return redirect()->route('volunteer.dashboard')
                ->with('success', 'Welcome back!');
        }

        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput();
    }

    /**
     * Show OTP login form
     */
    public function showLoginOtp()
    {
        return view('volunteer.login-otp');
    }

    /**
     * Handle login with mobile OTP
     */
    public function loginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $volunteer = Volunteer::where('mobile', $request->mobile)->first();
        
        if (!$volunteer) {
            return redirect()->back()
                ->withErrors(['mobile' => 'Mobile number not found'])
                ->withInput();
        }

        $otp = $volunteer->mobileOtps()
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return redirect()->back()
                ->withErrors(['otp' => 'Invalid or expired OTP'])
                ->withInput();
        }

        // Mark OTP as used
        $otp->markAsUsed();
        
        // Login volunteer
        Auth::guard('volunteer')->login($volunteer);
        $volunteer->updateLastLogin();

        return redirect()->route('volunteer.dashboard')
            ->with('success', 'Login successful!');
    }

    /**
     * Send OTP for login
     */
    public function sendLoginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Mobile number is required'
            ]);
        }

        $volunteer = Volunteer::where('mobile', $request->mobile)->first();
        
        if (!$volunteer) {
            return response()->json([
                'success' => false,
                'message' => 'Mobile number not found'
            ]);
        }

        // Send OTP
        $this->sendMobileOtp($volunteer);

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully!',
            'debug_otp' => session('mobile_otp') // For testing only
        ]);
    }

    /**
     * Show mobile verification form
     */
    public function showMobileVerification()
    {
        return view('volunteer.verify-mobile');
    }

    /**
     * Handle mobile verification
     */
    public function verifyMobile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $volunteer = Volunteer::where('mobile', $request->mobile)->first();
        
        if (!$volunteer) {
            return redirect()->back()
                ->withErrors(['mobile' => 'Mobile number not found'])
                ->withInput();
        }

        $otp = $volunteer->mobileOtps()
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return redirect()->back()
                ->withErrors(['otp' => 'Invalid or expired OTP'])
                ->withInput();
        }

        // Mark OTP as used and verify mobile
        $otp->markAsUsed();
        $volunteer->update([
            'mobile_verified' => true,
            'mobile_verified_at' => now(),
        ]);

        return redirect()->route('volunteer.verify.email')
            ->with('success', 'Mobile number verified! Please verify your email.')
            ->with('email', $volunteer->email);
    }

    /**
     * Show email verification form
     */
    public function showEmailVerification()
    {
        return view('volunteer.verify-email');
    }

    /**
     * Handle email verification
     */
    public function verifyEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $volunteer = Volunteer::where('email', $request->email)->first();
        
        if (!$volunteer) {
            return redirect()->back()
                ->withErrors(['email' => 'Email not found'])
                ->withInput();
        }

        $otp = $volunteer->emailOtps()
            ->where('otp', $request->otp)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otp) {
            return redirect()->back()
                ->withErrors(['otp' => 'Invalid or expired OTP'])
                ->withInput();
        }

        // Mark OTP as used and verify email
        $otp->markAsUsed();
        $volunteer->update([
            'email_verified' => true,
            'email_verified_at' => now(),
            'status' => 'active',
        ]);

        return redirect()->route('volunteer.login')
            ->with('success', 'Registration successful! You can now log in with your email and password.');
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|string',
            'type' => 'required|in:mobile,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid request'], 400);
        }

        // Find volunteer by mobile or email based on type
        if ($request->type === 'mobile') {
            $volunteer = Volunteer::where('mobile', $request->mobile)->first();
        } else {
            $volunteer = Volunteer::where('email', $request->mobile)->first(); // mobile field contains email for email OTP
        }
        
        if (!$volunteer) {
            return response()->json(['error' => 'Volunteer not found'], 404);
        }

        if ($request->type === 'mobile') {
            $this->sendMobileOtp($volunteer);
            // Preserve mobile number in session for the verification page
            session(['mobile' => $request->mobile]);
        } else {
            $this->sendEmailOtp($volunteer);
            // Preserve email in session for the verification page
            session(['email' => $volunteer->email]);
        }

        return response()->json(['message' => 'OTP sent successfully']);
    }

    /**
     * Show dashboard
     */
    public function dashboard()
    {
        $volunteer = Auth::guard('volunteer')->user();
        return view('volunteer.dashboard', compact('volunteer'));
    }

    /**
     * Show profile
     */
    public function profile()
    {
        $volunteer = Auth::guard('volunteer')->user();
        return view('volunteer.profile', compact('volunteer'));
    }

    /**
     * Update profile
     */
    public function updateProfile(Request $request)
    {
        $volunteer = Auth::guard('volunteer')->user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:volunteers,email,' . $volunteer->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $volunteer->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::guard('volunteer')->logout();
        return redirect()->route('volunteer.login')
            ->with('success', 'Logged out successfully!');
    }

    /**
     * Send mobile OTP
     */
    private function sendMobileOtp(Volunteer $volunteer)
    {
        $otp = VolunteerOtp::generateOtp();
        
        VolunteerOtp::create([
            'volunteer_id' => $volunteer->id,
            'type' => 'mobile',
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // TODO: Integrate with SMS service
        // For now, we'll just log the OTP and store in session for testing
        \Log::info("Mobile OTP for {$volunteer->mobile}: {$otp}");
        
        // Store OTP in session for easy testing
        session(['mobile_otp_' . $volunteer->mobile => $otp]);
        session(['mobile_otp_time_' . $volunteer->mobile => now()]);
    }

    /**
     * Send email OTP
     */
    private function sendEmailOtp(Volunteer $volunteer)
    {
        $otp = VolunteerOtp::generateOtp();
        
        VolunteerOtp::create([
            'volunteer_id' => $volunteer->id,
            'type' => 'email',
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // TODO: Integrate with email service
        // For now, we'll just log the OTP and store in session for testing
        \Log::info("Email OTP for {$volunteer->email}: {$otp}");
        
        // Store OTP in session for easy testing
        session(['email_otp_' . $volunteer->email => $otp]);
        session(['email_otp_time_' . $volunteer->email => now()]);
    }
}
