<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $guarded = [];
    protected $casts = ['features' => 'array'];
    
    public function subscriptions() { return $this->hasMany(Subscription::class); }
}

class Subscription extends Model
{
    protected $table = 'user_subscriptions';
    protected $guarded = [];
    protected $casts = ['expires_at' => 'datetime'];
    
    public function user() { return $this->belongsTo(User::class); }
    public function plan() { return $this->belongsTo(PricingPlan::class, 'pricing_plan_id'); }
    public function payments() { return $this->hasMany(Payment::class); }
    
    public function isActive() { return $this->status === 'active' && $this->expires_at > now(); }
    public function canPostAd() { return $this->plan->ads_limit === null || $this->ads_used < $this->plan->ads_limit; }
}

class Payment extends Model
{
    protected $guarded = [];
    
    public function subscription() { return $this->belongsTo(Subscription::class); }
}