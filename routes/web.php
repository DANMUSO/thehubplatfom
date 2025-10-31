<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Add this import

Route::get('/', function () {
    return view('welcome');
});


Route::get('/vehicles', [App\Http\Controllers\Dashboard\AdsController::class, 'vehicles'])->name('vehicles');
Route::get('/realestate', [App\Http\Controllers\Dashboard\AdsController::class, 'realestate'])->name('realestate');
Route::get('/phones', [App\Http\Controllers\Dashboard\AdsController::class, 'phones'])->name('phones');
Route::get('/electronics', [App\Http\Controllers\Dashboard\AdsController::class, 'electronics'])->name('electronics');
Route::get('/others', [App\Http\Controllers\Dashboard\AdsController::class, 'others'])->name('others');

Route::get('/test-auth', function() {
    return response()->json([
        'authenticated' => auth()->check(),
        'user_id' => auth()->id(),
        'user' => auth()->user()
    ]);
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('client-classification', function () {
    return view('clientclasification'); // This matches your actual file name
})->middleware(['auth'])->name('client-classification');

Route::get('packages', function () {
    return view('packages'); // This matches your actual file name
})->middleware(['auth'])->name('packages');
Route::get('messages', function () {
    return view('messages'); // This matches your actual file name
})->middleware(['auth'])->name('messages');
Route::get('adsanalytics', function () {
    return view('adsanalytics'); // This matches your actual file name
})->middleware(['auth'])->name('adsanalytics');
Route::get('profilev1', function () {
    return view('profile'); // This matches your actual file name
})->middleware(['auth'])->name('profilev1');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
 Route::get('/post/{post}', [App\Http\Controllers\Dashboard\AdsController::class, 'product'])->name('post.show');
    Route::get('/listedads', [App\Http\Controllers\Dashboard\AdsController::class, 'index'])
        ->name('listedads');

    Route::get('/mapview', [App\Http\Controllers\Dashboard\LocationController::class, 'ads'])
        ->name('mapview');
Route::middleware(['auth'])->group(function () {
 
    //Locations Management
    Route::get('/api/locations', [App\Http\Controllers\Dashboard\LocationController::class, 'locations'])->name('locations.index');
    Route::get('/locations', [App\Http\Controllers\Dashboard\LocationController::class, 'index'])->name('locations.index');
    Route::get('/locations/data', [App\Http\Controllers\Dashboard\LocationController::class, 'getData']);
     Route::get('/locations/alldata', [App\Http\Controllers\Dashboard\LocationController::class, 'getAllData']);
    Route::get('/locations/stats', [App\Http\Controllers\Dashboard\LocationController::class, 'getStats']);
    Route::post('/locations', [App\Http\Controllers\Dashboard\LocationController::class, 'store']);
    Route::post('/locations/{id}', [App\Http\Controllers\Dashboard\LocationController::class, 'update']);
    Route::delete('/locations/{id}', [App\Http\Controllers\Dashboard\LocationController::class, 'destroy']);
    Route::post('/locations/bulk-action', [App\Http\Controllers\Dashboard\LocationController::class, 'bulkAction']);


    // Update profile information (name, email, phone)
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');
    
    // Phone verification routes
    Route::post('/profile/phone/send-code', [App\Http\Controllers\ProfileController::class, 'sendVerificationCode'])->name('phone.send-code');
    Route::post('/profile/phone/verify', [App\Http\Controllers\ProfileController::class, 'verifyPhone'])->name('phone.verify');
    
    // Update password
    Route::put('/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('password.update');
    //Payment routes
        Route::post('/payment/initiate', [App\Http\Controllers\PaymentController::class, 'initiatePayment'])
        ->name('payment.initiate');
    
    Route::get('/payment/status/{transactionId}', [App\Http\Controllers\PaymentController::class, 'checkStatus'])
        ->name('payment.status');
    
    Route::get('/subscriptions', [App\Http\Controllers\PaymentController::class, 'mySubscriptions'])
        ->name('subscriptions.index');
    
    Route::delete('/subscriptions/{id}/cancel', [App\Http\Controllers\PaymentController::class, 'cancelSubscription'])
        ->name('subscriptions.cancel');

        //Post MGT routes
    Route::get('/postmgt', [App\Http\Controllers\PostController::class, 'index'])->name('postmgt');
    Route::get('/posts/data', [App\Http\Controllers\PostController::class, 'getPosts'])->name('posts.data');
    Route::get('/posts/stats', [App\Http\Controllers\PostController::class, 'getStats'])->name('posts.stats');
    Route::delete('/posts/{post}/photo', [App\Http\Controllers\PostController::class, 'deletePhoto'])->name('posts.photo.delete');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    
    Route::post('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/bulk-action', [App\Http\Controllers\PostController::class, 'bulkAction'])->name('posts.bulk');
});
require __DIR__.'/auth.php';

// Social Authentication Routes
Route::get('/auth/{provider}', [App\Http\Controllers\SocialAuthController::class, 'redirectToProvider'])->name('social.auth');
Route::get('/auth/{provider}/callback', [App\Http\Controllers\SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

