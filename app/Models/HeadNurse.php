<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class HeadNurse extends Model
{
    use LogsActivity;
    protected $guarded = [];

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
        return asset('build/images/nurse.jpg');
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
