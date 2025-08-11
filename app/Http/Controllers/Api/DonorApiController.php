<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonorApiController extends BaseApiController
{
    /**
     * Register a new donor (by volunteer)
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'volunteer_id' => 'required|exists:volunteers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email',
            'phone' => 'required|string|unique:donors,phone',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }
        $donor = Donor::create([
            'volunteer_id' => $request->volunteer_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'company_name' => $request->company_name,
        ]);
        return $this->successResponse([
            'donor' => $donor
        ], 'Donor registered successfully', 201);
    }

    /**
     * Update donor details (requires 'id' in request body)
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:donors,id',
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:donors,email,' . $request->id,
            'phone' => 'sometimes|required|string|unique:donors,phone,' . $request->id,
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }
        $donor = Donor::find($request->id);
        if (!$donor) {
            return $this->errorResponse('Donor not found', 404);
        }
        $donor->update($request->only([
            'name', 'email', 'phone', 'address', 'city', 'state', 'company_name'
        ]));
        return $this->successResponse([
            'donor' => $donor
        ], 'Donor updated successfully');
    }

    /**
     * List all donors (not soft deleted)
     */
    public function index()
    {
        $donors = Donor::whereNull('deleted_at')->get();
        return $this->successResponse(['donors' => $donors], 'Donors retrieved successfully');
    }

    /**
     * Show a single donor
     */
    public function show($id)
    {
        $donor = Donor::where('id', $id)->whereNull('deleted_at')->first();
        if (!$donor) {
            return $this->errorResponse('Donor not found', 404);
        }
        return $this->successResponse(['donor' => $donor], 'Donor retrieved successfully');
    }

    /**
     * Soft delete a donor (POST, id in body)
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:donors,id',
        ]);
        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }
        $donor = Donor::find($request->id);
        if (!$donor || $donor->deleted_at) {
            return $this->errorResponse('Donor not found', 404);
        }
        $donor->delete();
        return $this->successResponse(null, 'Donor deleted (soft) successfully');
    }
}
