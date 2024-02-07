<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, LaratrustUserTrait;

    protected $fillable = ['username', 'email', 'password', 'phone', 'image'];
    protected $hidden = ['password'];
}