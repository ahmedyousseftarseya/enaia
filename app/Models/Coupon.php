<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public const STATUS = [
        'active' => 'active',
        'inactive' => 'inactive',
    ];

    public const TYPE = [
        'fixed' => 'fixed',
        'percent' => 'percent',
    ];

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('code', 'like', '%' . request('search') . '%');
        }

        if (request('status')) {
            $q->where('status', request('status'));
        }

        if (request('type')) {
            $q->where('type', request('type'));
        }
    }
}
