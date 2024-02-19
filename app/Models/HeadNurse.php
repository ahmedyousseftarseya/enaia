<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function nurses()
    {
        return $this->belongsToMany(Nurse::class, 'head_nurse_nurses', 'head_nurse_id', 'nurse_id');
    }

    public function getNursesIds()
    {
        return DB::table('head_nurse_nurses')->where('head_nurse_id', $this->id)->pluck('nurse_id')->toArray();
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    }
}
