<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class City extends Model implements TranslatableContract
{
    use Translatable;
    protected array $translatedAttributes = ['name'];
    protected $fillable = ['country_id'];

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
