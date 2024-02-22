<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait, LogsActivity;

    protected $fillable = ['username', 'email', 'password', 'phone', 'image'];
    protected $hidden = ['password'];

    protected $appends = ['image_url'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset($this->image);
        return asset('build/images/user.jpg');
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
