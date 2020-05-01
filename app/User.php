<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function owns(Model $model)
    {
        return $this->id == $model->user_id;
    }

    public function follow()
    {
        return $this->belongsToMany(Question::class,'user_question')->withTimestamps();

    }

    public function followThis($question)
    {
        return $this->follow()->toggle($question);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //このユーザーはこの質問をフォローしているか
    public function followed($question)
    {
        return !!$this->follow()->where('question_id',$question)->count();
    }
}
