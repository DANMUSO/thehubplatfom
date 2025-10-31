<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'amount' => 'decimal:2',
    ];
    
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    
    public function isPending()
    {
        return $this->status === 'pending';
    }
    
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
    
    public function isFailed()
    {
        return $this->status === 'failed';
    }
    
    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
    }
    
    public function markAsFailed()
    {
        $this->update(['status' => 'failed']);
    }
}