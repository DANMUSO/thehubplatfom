<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleSocialAuthErrors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        // Add this debug line
        \Log::info('Google callback hit', ['provider' => $provider]);
        
        $socialUser = Socialite::driver($provider)->user();
        if ($request->has('error')) {
            return redirect('/login')->with('error', 'Authentication was cancelled');
        }

        return $response;
    }
}