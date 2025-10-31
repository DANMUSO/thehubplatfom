<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
/**
     * Update user profile (name, email, and phone)
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'regex:/^\+[1-9]\d{1,14}$/'],
        ], [
            'phone.regex' => 'Please enter a valid phone number with country code (e.g., +254712345678)'
        ]);

        // Check if phone number is being changed
        $phoneChanged = $request->phone && $request->phone !== $user->phone;

        // Update user data
        $updateData = $request->only('name', 'email', 'phone');
        
        // If phone changed, reset verification
        if ($phoneChanged) {
            $updateData['phone_verified_at'] = null;
        }
        
        $user->update($updateData);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'phone_changed' => $phoneChanged,
            'phone_verified' => $user->phone_verified_at ? true : false
        ], 200);
    }

    /**
     * Send verification code to phone number
     */
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'regex:/^\+[1-9]\d{1,14}$/'],
        ], [
            'phone.regex' => 'Please enter a valid phone number with country code (e.g., +254712345678)'
        ]);

        // Generate 6-digit verification code
        $code = rand(100000, 999999);

        // Store in session with 10-minute expiry
        session([
            'phone_verification_code' => $code,
            'phone_verification_number' => $request->phone,
            'phone_verification_expires' => now()->addMinutes(10),
        ]);

        // Send SMS
        $this->sendSMS($request->phone, "Your verification code is: $code. Valid for 10 minutes.");

        return response()->json([
            'success' => true,
            'message' => 'Verification code sent successfully'
        ], 200);
    }

    /**
 * Verify the phone number with code - With Debug Logging
 */
public function verifyPhone(Request $request)
{
    Log::info('=== PHONE VERIFICATION STARTED ===');
    Log::info('Request data:', $request->all());
    
    $request->validate([
        'phone' => ['required', 'string'],
        'verification_code' => ['required', 'digits:6'],
    ]);

    // Get session data
    $sessionCode = session('phone_verification_code');
    $sessionPhone = session('phone_verification_number');
    $expiresAt = session('phone_verification_expires');

    Log::info('Session data:', [
        'session_code' => $sessionCode,
        'session_phone' => $sessionPhone,
        'expires_at' => $expiresAt,
        'request_code' => $request->verification_code,
        'request_phone' => $request->phone
    ]);

    // Check if code exists and not expired
    if (!$sessionCode || !$expiresAt || now()->greaterThan($expiresAt)) {
        Log::warning('Verification code expired or not found');
        return response()->json([
            'success' => false,
            'errors' => [
                'verification_code' => ['Verification code has expired. Please request a new one.']
            ]
        ], 422);
    }

    // Verify code and phone number match
    if ($request->verification_code != $sessionCode || $request->phone != $sessionPhone) {
        Log::warning('Verification code or phone mismatch');
        return response()->json([
            'success' => false,
            'errors' => [
                'verification_code' => ['Invalid verification code. Please try again.']
            ]
        ], 422);
    }

    // Update user's phone and mark as verified
    $user = Auth::user();
    Log::info('User before update:', [
        'id' => $user->id,
        'phone' => $user->phone,
        'phone_verified_at' => $user->phone_verified_at
    ]);

    try {
        $updated = $user->update([
            'phone' => $request->phone,
            'phone_verified_at' => now(),
        ]);
        
        Log::info('Update result:', ['success' => $updated]);
        
        // Refresh the user to get updated data
        $user->refresh();
        
        Log::info('User after update:', [
            'id' => $user->id,
            'phone' => $user->phone,
            'phone_verified_at' => $user->phone_verified_at
        ]);
        
    } catch (\Exception $e) {
        Log::error('Update failed:', ['error' => $e->getMessage()]);
        return response()->json([
            'success' => false,
            'errors' => [
                'verification_code' => ['Failed to update phone number. Please try again.']
            ]
        ], 500);
    }

    // Clear session data
    session()->forget([
        'phone_verification_code',
        'phone_verification_number',
        'phone_verification_expires'
    ]);

    Log::info('=== PHONE VERIFICATION COMPLETED ===');

    return response()->json([
        'success' => true,
        'message' => 'Phone number verified successfully',
        'data' => [
            'phone' => $user->phone,
            'verified_at' => $user->phone_verified_at ? $user->phone_verified_at->format('F j, Y') : null
        ]
    ], 200);
}

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'current_password.current_password' => 'The current password is incorrect.',
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password updated successfully'
        ], 200);
    }

    /**
     * Send SMS via provider
     */
    private function sendSMS($phone, $message)
    {
        // Log for development
        Log::info("SMS to {$phone}: {$message}");

        // TODO: Integrate with SMS provider
        // Example for Africa's Talking:
        /*
        try {
            $username = config('services.africastalking.username');
            $apiKey = config('services.africastalking.api_key');
            
            $AT = new \AfricasTalking\SDK\AfricasTalking($username, $apiKey);
            $sms = $AT->sms();
            
            $result = $sms->send([
                'to' => $phone,
                'message' => $message
            ]);
            
            Log::info('SMS sent successfully', ['result' => $result]);
        } catch (\Exception $e) {
            Log::error('SMS sending failed: ' . $e->getMessage());
        }
        */

        // Example for Twilio:
        /*
        try {
            $sid = config('services.twilio.sid');
            $token = config('services.twilio.token');
            $from = config('services.twilio.from');
            
            $twilio = new \Twilio\Rest\Client($sid, $token);
            
            $twilio->messages->create($phone, [
                'from' => $from,
                'body' => $message
            ]);
            
            Log::info('SMS sent via Twilio');
        } catch (\Exception $e) {
            Log::error('Twilio SMS failed: ' . $e->getMessage());
        }
        */
    }
}
