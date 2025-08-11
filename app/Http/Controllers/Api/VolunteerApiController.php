<?php

namespace App\Http\Controllers\Api;

use App\Models\Volunteer;
use App\Models\VolunteerOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VolunteerApiController extends BaseApiController
{
    /**
     * Test method to debug request data
     */
    public function testRequest(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Test endpoint reached',
            'data' => [
                'all_data' => $request->all(),
                'json_data' => $request->json()->all(),
                'input_data' => $request->input(),
                'raw_content' => $request->getContent(),
                'content_type' => $request->header('Content-Type'),
                'accept' => $request->header('Accept'),
                'method' => $request->method(),
                'mobile_from_input' => $request->input('mobile'),
                'mobile_from_json' => $request->json('mobile'),
                'mobile_from_get' => $request->get('mobile'),
                'mobile_from_post' => $request->post('mobile'),
            ]
        ]);
    }

    /**
     * Add new volunteer
     */
    public function store(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|size:10|unique:volunteers,mobile',
                'email' => 'required|email|unique:volunteers,email|max:255',
                'password' => 'required|string|min:6|max:255',
                'address' => 'nullable|string|max:500',
                'skills' => 'nullable|string|max:500',
                'interests' => 'nullable|string|max:500',
                'availability' => 'nullable|string|max:255',
                'emergency_contact_name' => 'nullable|string|max:255',
                'emergency_contact_phone' => 'nullable|string|max:15',
            ]);

            if ($validator->fails()) {
                return $this->validationErrorResponse($validator->errors());
            }

            // Create volunteer
            $volunteer = Volunteer::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'skills' => $request->skills,
                'interests' => $request->interests,
                'availability' => $request->availability,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_phone,
                'status' => 'pending', // Default status
                'mobile_verified' => false,
                'email_verified' => false,
            ]);

            // Return success response
            return $this->successResponse([
                'volunteer' => [
                    'id' => $volunteer->id,
                    'name' => $volunteer->name,
                    'mobile' => $volunteer->mobile,
                    'email' => $volunteer->email,
                    'status' => $volunteer->status,
                    'created_at' => $volunteer->created_at
                ]
            ], 'Volunteer registered successfully', 201);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to register volunteer: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get volunteer details
     */
    public function show($id)
    {
        try {
            $volunteer = Volunteer::find($id);
            
            if (!$volunteer) {
                return $this->errorResponse('Volunteer not found', 404);
            }

            return $this->successResponse([
                'volunteer' => $volunteer
            ], 'Volunteer details retrieved successfully');

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to retrieve volunteer details: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get all volunteers
     */
    public function index()
    {
        try {
            $volunteers = Volunteer::select('id', 'name', 'mobile', 'email', 'status', 'created_at')
                                 ->orderBy('created_at', 'desc')
                                 ->get();

            return $this->successResponse([
                'volunteers' => $volunteers,
                'total' => $volunteers->count()
            ], 'Volunteers retrieved successfully');

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to retrieve volunteers: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Send OTP to mobile number
     */
    public function sendMobileOtp(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|string|size:10',
            ]);

            if ($validator->fails()) {
                return $this->validationErrorResponse($validator->errors());
            }

            // Find volunteer by mobile
            $volunteer = Volunteer::where('mobile', $request->input('mobile'))->first();
            
            if (!$volunteer) {
                return $this->errorResponse('Volunteer not found with this mobile number', 404);
            }

            // Generate OTP
            $otp = VolunteerOtp::generateOtp();
            
            // Create OTP record
            VolunteerOtp::create([
                'volunteer_id' => $volunteer->id,
                'type' => 'mobile',
                'otp' => $otp,
                'expires_at' => now()->addMinutes(10), // OTP expires in 10 minutes
            ]);

            // TODO: Integrate with SMS service to send OTP
            // For now, we'll return the OTP in response for testing
            // In production, remove the OTP from response and send via SMS

            return $this->successResponse([
                'message' => 'OTP sent successfully',
                'expires_in' => '10 minutes',
                'otp' => $otp, // Remove this in production
            ], 'OTP sent to mobile number', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to send OTP: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Verify mobile OTP
     */
    public function verifyMobileOtp(Request $request)
    {
        try {
            // Debug: Log the request data
            \Log::info('Verify OTP Request Data:', [
                'all' => $request->all(),
                'json' => $request->json()->all(),
                'input' => $request->input(),
                'content_type' => $request->header('Content-Type'),
                'raw_input' => $request->getContent(),
            ]);

            // Try to get data from multiple sources
            $mobile = $request->input('mobile') ?? $request->json('mobile') ?? $request->get('mobile');
            $otp = $request->input('otp') ?? $request->json('otp') ?? $request->get('otp');

            // Validate request
            $validator = Validator::make([
                'mobile' => $mobile,
                'otp' => $otp
            ], [
                'mobile' => 'required|string|size:10',
                'otp' => 'required|string|size:6',
            ]);

            if ($validator->fails()) {
                return $this->validationErrorResponse($validator->errors());
            }

            // Find volunteer by mobile
            $volunteer = Volunteer::where('mobile', $mobile)->first();
            echo $volunteer;
            
            if (!$volunteer) {
                return $this->errorResponse('Volunteer not found with this mobile number', 404);
            }

            // Find valid OTP
            $otpRecord = $volunteer->mobileOtps()
                ->where('otp', $request->otp)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->first();

            if (!$otpRecord) {
                return $this->errorResponse('Invalid or expired OTP', 400);
            }

            // Mark OTP as used
            $otpRecord->markAsUsed();

            // Update volunteer mobile verification status
            $volunteer->update([
                'mobile_verified' => true,
                'mobile_verified_at' => now(),
            ]);

            return $this->successResponse([
                'volunteer' => [
                    'id' => $volunteer->id,
                    'name' => $volunteer->name,
                    'mobile' => $volunteer->mobile,
                    'mobile_verified' => true,
                    'mobile_verified_at' => $volunteer->mobile_verified_at,
                ]
            ], 'Mobile number verified successfully', 200);

        } catch (\Exception $e) {
            return $this->errorResponse('Failed to verify OTP: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Send OTP to email
     */
    public function sendEmailOtp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                return $this->validationErrorResponse($validator->errors());
            }
            $volunteer = Volunteer::where('email', $request->email)->first();
            if (!$volunteer) {
                return $this->errorResponse('Volunteer not found with this email', 404);
            }
            $otp = VolunteerOtp::generateOtp();
            VolunteerOtp::create([
                'volunteer_id' => $volunteer->id,
                'type' => 'email',
                'otp' => $otp,
                'expires_at' => now()->addMinutes(10),
            ]);
            // TODO: Integrate with email service to send OTP
            // For now, return OTP in response for testing
            return $this->successResponse([
                'message' => 'OTP sent successfully',
                'expires_in' => '10 minutes',
                'otp' => $otp, // Remove in production
            ], 'OTP sent to email', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to send OTP: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Verify email OTP
     */
    public function verifyEmailOtp(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'otp' => 'required|string|size:6',
            ]);
            if ($validator->fails()) {
                return $this->validationErrorResponse($validator->errors());
            }

            print_r($request);


            $volunteer = Volunteer::where('email', $request->email)->first();
            if (!$volunteer) {
                return $this->errorResponse('Volunteer not found with this email', 404);
            }
            $otpRecord = $volunteer->emailOtps()
                ->where('otp', $request->otp)
                ->where('used', false)
                ->where('expires_at', '>', now())
                ->first();
            if (!$otpRecord) {
                return $this->errorResponse('Invalid or expired OTP', 400);
            }
            $otpRecord->markAsUsed();
            $volunteer->update([
                'email_verified' => true,
                'email_verified_at' => now(),
            ]);
            return $this->successResponse([
                'volunteer' => [
                    'id' => $volunteer->id,
                    'name' => $volunteer->name,
                    'email' => $volunteer->email,
                    'email_verified' => true,
                    'email_verified_at' => $volunteer->email_verified_at,
                ]
            ], 'Email verified successfully', 200);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to verify OTP: ' . $e->getMessage(), 500);
        }
    }
} 