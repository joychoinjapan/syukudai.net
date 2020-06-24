<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =
        ['user_id','question_id','content', 'adopted','votes_count','comments_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    public function scopeAdopted($query){
        return $query->where('adopted','T');
    }
}
