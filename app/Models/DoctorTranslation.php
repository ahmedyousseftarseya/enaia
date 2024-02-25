<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    protected $fillable = ['name', 'about', 'experience'];
    public $timestamps = false;
}
