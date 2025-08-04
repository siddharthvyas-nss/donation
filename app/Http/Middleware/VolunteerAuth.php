<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VolunteerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('volunteer')->check()) {
            return redirect()->route('volunteer.login')
                ->with('error', 'Please login to access this page.');
        }

        $volunteer = auth()->guard('volunteer')->user();
        
        // Check if volunteer is active
        if (!$volunteer->isActive()) {
            auth()->guard('volunteer')->logout();
            return redirect()->route('volunteer.login')
                ->with('error', 'Your account is not active. Please contact support.');
        }

        return $next($request);
    }
}
