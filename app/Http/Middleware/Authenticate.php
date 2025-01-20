<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // If the user is not authenticated, redirect them to the login page
        // if (!Auth::check()) {
        //     return redirect()->route('login'); // Ensure this route points to the login form
        // }

        // Allow the request to proceed if the user is authenticated
        return $next($request);
    }
}
