<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'provider',
        'phone_verified_at',
        'provider_id',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',  // ← Add this line
            'password' => 'hashed',
        ];
    }
    // In App\Models\User.php

public function payments()
{
    return $this->hasMany(Payment::class);
}

public function subscriptions()
{
    return $this->hasMany(Subscription::class);
}

public function activeSubscription($category)
{
    return $this->subscriptions()
        ->where('category', $category)
        ->where('is_active', true)
        ->where('expires_at', '>', now())
        ->first();
}

}
