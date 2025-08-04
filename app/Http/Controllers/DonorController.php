<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonorController extends Controller
{
    /**
     * Show add donor form
     */
    public function showAdd()
    {
        return view('donor.add');
    }

    /**
     * Store new donor
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:donors,email',
            'mobile' => 'required|string|unique:donors,mobile',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // TODO: Create donor model and save to database
        // For now, just redirect with success message
        return redirect()->route('donor.list')
            ->with('success', 'Donor added successfully!');
    }

    /**
     * Show all donors
     */
    public function index()
    {
        // TODO: Fetch donors from database
        $donors = []; // Placeholder for now
        
        return view('donor.list', compact('donors'));
    }

    /**
     * Show donor reports
     */
    public function reports()
    {
        return view('donor.reports');
    }

    /**
     * Show deleted donors (trash)
     */
    public function trash()
    {
        return view('donor.trash');
    }
} 