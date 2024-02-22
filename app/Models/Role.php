<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends LaratrustRole
{
    use LogsActivity;

    public $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }
    
    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
