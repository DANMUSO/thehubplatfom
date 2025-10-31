<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'price',
        'county',
        'location_id',
        'description',
        'status',
        'featured',
        'views',
        'inquiries',
        'photos',
        'user_id'
    ];

    protected $casts = [
        'photos' => 'array',
        'featured' => 'boolean',
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageCountAttribute()
    {
        return $this->photos ? count($this->photos) : 0;
    }
    // New relationship: A post belongs to a location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function getFullLocationAttribute()
    {
        // Now using the relationship to get location details
        return $this->location ? $this->location->business_name . ', ' . $this->county : $this->county;
    }
}