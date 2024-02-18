<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadNurse extends Model
{
    protected $fillable = ['image', 'name', 'phone', 'password'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset($this->image);
        return asset('build/images/user.png');
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    }
}
