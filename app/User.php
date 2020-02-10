<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'avatar',
        'password',
        'phone',
        'address',
        'level',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function rates()
    {
    	return $this->hasMany(Rate::class);
    }

    public function news()
    {
    	return $this->hasMany(News::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
