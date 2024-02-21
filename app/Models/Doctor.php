<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Support\Facades\DB;

class Doctor extends Model implements TranslatableContract
{
    use Translatable;

    protected array $translatedAttributes = ['name', 'about', 'experience'];
    protected $fillable = ['image', 'phone', 'password', 'email', 'specialization_id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image)
            return asset($this->image);
        return asset('build/images/doctor.png');
    }
    
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function nurses()
    {
        return $this->belongsToMany(Nurse::class, 'doctor_nurses', 'doctor_id', 'nurse_id');
    }

    public function getNursesIds()
    {
        return DB::table('doctor_nurses')->where('doctor_id', $this->id)->pluck('nurse_id')->toArray();
    }

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->whereTranslationLike('name', request('search'))
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        if (request('specialization_id')) {
            $q->where('specialization_id', request('specialization_id'));
        }
    }
}
