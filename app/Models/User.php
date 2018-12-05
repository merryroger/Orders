<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function scopeEmail($query, $email)
    {
        return $query->where('email', $email);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }
}
