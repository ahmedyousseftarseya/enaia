<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Country extends Model implements TranslatableContract
{
    use Translatable;

    protected array $translatedAttributes = ['name'];

    protected $fillable = ['image', 'zip_code', 'digit_number'];
}
