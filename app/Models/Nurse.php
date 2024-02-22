<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Nurse extends Model
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

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }
    }
}
