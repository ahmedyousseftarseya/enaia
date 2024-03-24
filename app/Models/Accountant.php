<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Accountant extends Authenticatable
{
    protected $fillable = ['name', 'username', 'email', 'phone', 'password', 'image'];

    protected $hidden = ['password'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset($this->image);
        return asset('build/images/user.jpg');
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('username', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    }
}
