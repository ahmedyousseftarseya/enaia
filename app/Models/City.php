<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;
    protected array $translatedAttributes = ['name'];
    protected $fillable = ['country_id', 'shipping_cost'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->whereTranslationLike('name', request('search'));
        }

        if (request()->country_id) {
            $q->where('country_id', request()->country_id);
        }
    }
}
