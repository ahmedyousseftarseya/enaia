<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('ref_no', 'like', '%' . request('search') . '%');
        }

        if (request('is_return')) {
            $q->where('is_return', request('is_return'));
        }

        if (request('date')) {
            $q->whereDate('date', request('date'));
        }
    }
}
