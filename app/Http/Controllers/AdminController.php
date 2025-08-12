<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // ...other methods...

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();

        // Debug output
        ([
            'credentials' => $credentials,
            'admin' => $admin,
            'password_match' => $admin ? \Hash::check($credentials['password'], $admin->password) : null,
        ]);

        if (auth()->guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // ...other methods...


    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}

    // Add other methods as needed
