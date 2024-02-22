<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Service extends Model implements TranslatableContract
{
    use Translatable;

    protected array $translatedAttributes = ['title', 'description'];
    protected $fillable = ['image', 'active'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : asset('build/images/service.png');
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->whereTranslationLike('title', request('search'))
                ->orWhereTranslationLike('description', request('search'));
        }
    }
}
