<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Specialization extends Model implements TranslatableContract
{
    use Translatable;

    protected array $translatedAttributes = ['name'];

}
