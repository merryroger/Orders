<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function scopeOwnedByUser($query, $user_name)
    {
        return $query->where('name', $user_name);
    }

    public function scopeOwnedByMail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeUnchecked($query)
    {
        return $query->where('checked', false);
    }
    /*
        public function scopeLastOrders($query, $diff_sec)
        {
            return $query->whereRaw("TIME_TO_SEC(TIMEDIFF(NOW(), created_at)) <= " . $diff_sec);
        }
    */
}
