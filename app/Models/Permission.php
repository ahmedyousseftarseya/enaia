<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends LaratrustPermission
{
    use LogsActivity;
    
    public $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }
}
