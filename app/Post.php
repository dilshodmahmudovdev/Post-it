<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'img_url'
    ];

    protected $dates = ['created_at'];


    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getTimeAgoAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

}
