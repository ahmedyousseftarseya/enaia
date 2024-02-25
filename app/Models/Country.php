<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;

    protected array $translatedAttributes = ['name'];

    protected $fillable = ['image', 'zip_code', 'digit_number'];

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
        return asset('build/images/country.jpg');
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->whereTranslationLike('name', request('search'));
        }
    }
}
