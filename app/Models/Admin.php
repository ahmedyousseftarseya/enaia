<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait;

    protected $fillable = ['username', 'email', 'password', 'phone', 'image'];
    protected $hidden = ['password'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset($this->image);
        return asset('build/images/user.png');
    }

    public function  getRole()
    {
        return $this->roles()->first();
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('username', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    }
}
