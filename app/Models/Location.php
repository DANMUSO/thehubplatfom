<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'business_name',
        'latitude',
        'longitude',
        'description',
        'status',
        'user_id'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // New relationship: A location can have many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
