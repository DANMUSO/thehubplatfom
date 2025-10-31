<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'user_subscriptions';
    
    protected $guarded = [];
    
    protected $casts = [
        'expires_at' => 'datetime',
        'amount' => 'decimal:2',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function plan()
    {
        return $this->belongsTo(PricingPlan::class, 'pricing_plan_id');
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
    public function isActive()
    {
        return $this->status === 'active' && $this->expires_at > now();
    }
    
    public function canPostAd()
    {
        return $this->plan->ads_limit === null || $this->ads_used < $this->plan->ads_limit;
    }
    
    public function incrementAdsUsed()
    {
        $this->increment('ads_used');
    }
    
    public function getRemainingAds()
    {
        if ($this->plan->ads_limit === null) {
            return 'Unlimited';
        }
        
        return max(0, $this->plan->ads_limit - $this->ads_used);
    }
}