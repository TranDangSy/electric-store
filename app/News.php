<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
