<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role->name == "admin") {
            return $next($request);
        }

        // If the user is not an admin, you can redirect them or return a response indicating they don't have access
        // For example, you can redirect them to the home page with a flash message
        // return redirect()->route('home')->with('error', 'You do not have permission to access this resource.');

        // Or you can return a forbidden response
        return redirect()->route('login')->with('error', 'You do not have permission to access this resource.');
    }
}
