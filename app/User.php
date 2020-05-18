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
        'name', 'email', 'password', 'avatar', 'confirmation_token', 'api_token'
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
        return $this->belongsToMany(Question::class, 'user_question')->withTimestamps();

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
        return !!$this->follow()->where('question_id', $question)->count();
    }


    //ユーザーがフォロしている人
    public function isFollowed()
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id','followed_id')->withTimestamps();
    }

    //ユーザーのフォロワー
    public function followers(){
        return $this->belongsToMany(self::class, 'followers', 'followed_id','follower_id')->withTimestamps();
    }

    public function followThisUser($user)
    {
        return $this->isFollowed()->toggle($user);
    }

    //ユーザーはアンサーに対しての投票「賛成」
    public function votes()
    {
        return $this->belongsToMany(Answer::class,'votes')->withTimestamps();
    }

    //賛成と賛成の解除
    public function voteFor($answer)
    {
        return $this->votes()->toggle($answer);
    }

    //賛成済
    public function hasVoted($id)
    {
        return !!$this->votes()->where('question_id',$id)->count();
    }

    //メッセージ
    public function message()
    {
        return $this->hasMany(Message::class,'to_user_id','id');
    }
}
