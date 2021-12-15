<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['brand', 'body', 'cosme','detail', 'price', 'user_id'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function favorites()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
