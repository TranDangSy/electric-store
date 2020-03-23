<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Overtrue\LaravelLike\Traits\Liker;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Liker;

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
        'last_login_at',
        'last_login_ip',
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
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
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
        return $this->hasMany(Comment::class);
    }
}
