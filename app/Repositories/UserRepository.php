<?php


namespace App\Repositories;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }

    public function withFollowedQuestions($id)
    {
        return User::where('id',$id)->with('follow','follow.user','follow.topics')->latest()->first();
    }

}
