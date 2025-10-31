<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Add this property that was missing
    private $enabledProviders = ['google']; // Add 'facebook', 'twitter' when ready

    public function redirectToProvider($provider)
    {
        // Check if provider is enabled
        if (!in_array($provider, $this->enabledProviders)) {
            return redirect('/login')->with('error', ucfirst($provider) . ' login is not available yet.');
        }

        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Authentication service is temporarily unavailable.');
        }
    }

    public function handleProviderCallback($provider)
{
    \Log::info('Social callback started', ['provider' => $provider]);
    
    if (!in_array($provider, $this->enabledProviders)) {
        \Log::error('Provider not enabled', ['provider' => $provider]);
        return redirect('/login')->with('error', ucfirst($provider) . ' login is not available yet.');
    }

    try {
        // Add more detailed logging before the Socialite call
        \Log::info('About to call Socialite driver');
        
        $socialUser = Socialite::driver($provider)->user();
        
        \Log::info('Social user retrieved successfully', [
            'email' => $socialUser->getEmail(),
            'name' => $socialUser->getName(),
            'id' => $socialUser->getId()
        ]);
        
    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        \Log::error('Invalid state exception', ['error' => $e->getMessage()]);
        return redirect('/auth/google')->with('error', 'Authentication session expired. Please try again.');
    } catch (\Exception $e) {
        \Log::error('Social auth error', [
            'provider' => $provider, 
            'error' => $e->getMessage(),
            'class' => get_class($e),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect('/login')->with('error', 'Authentication failed: ' . $e->getMessage());
    }

    // Rest of your existing code...
    $existingUser = User::where('email', $socialUser->getEmail())->first();

    if ($existingUser) {
        \Log::info('Existing user found', ['user_id' => $existingUser->id]);
        if (!$existingUser->provider) {
            $existingUser->update([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
            ]);
        }
        
        Auth::login($existingUser);
        \Log::info('User logged in', ['user_id' => $existingUser->id]);
    } else {
        \Log::info('Creating new user');
        $user = User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'avatar' => substr($socialUser->getAvatar(), 0, 255),
            'password' => Hash::make(Str::random(24)),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);
        \Log::info('New user created and logged in', ['user_id' => $user->id]);
    }

    \Log::info('Redirecting to dashboard');
    return redirect()->intended('/client-classification');
}
}