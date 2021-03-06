<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'user_question')->withTimestamps();
    }

    public function scopePublished($query)
    {
        return $query->where('is_hidden','F')->where('is_violation','F');
    }


    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
