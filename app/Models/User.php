<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use LaratrustUserTrait, LogsActivity;
    use HasApiTokens, HasFactory, Notifiable;

    public const GENDER = [
        'male' => 'male',
        'female' => 'female',
    ];

    public const STATUS = [
       'active' => 'active',
       'inactive' => 'inactive',
    ];

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
        return asset('build/images/user.jpg');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'national_id',
        'name',
        'date_of_birth',
        'phone',
        'email',
        'password',
        'gender',
        'nationality',
        'blood_group',
        'address',
        'lat',
        'lng',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFilter($q)
    {
        if (request('search')) {
            $q->where('national_id ', 'like', '%' . request('search') . '%')
                ->orWhere('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        if(request()->status) {
            $q->where('status', request()->status);
        }

        if(request()->gender) {
            $q->where('gender', request()->gender);
        }
    }
}
