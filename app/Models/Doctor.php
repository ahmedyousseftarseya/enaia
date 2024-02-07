<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Doctor extends Model implements TranslatableContract
{
    use Translatable;

    protected array $translatedAttributes = ['name', 'about', 'experience'];
    protected $fillable = ['image', 'phone', 'password', 'email', 'specialization_id'];
}
