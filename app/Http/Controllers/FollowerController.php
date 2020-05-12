<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }


    public function followers(Request $request)
    {
        return $this->user->byId($request->get('user_id'))->followers->count();
    }

    public function answers(Request $request)
    {
        return $this->user->byId($request->get('user_id'))->answers->count();
    }

    public function posts(Request $request)
    {

    }

    public function info(Request $request)
    {
        $followers = $this->followers($request);
        $answers = $this->answers($request);
        return response()->json(['followers' => $followers, 'answers' => $answers]);
    }

    public function followed($followed_id)
    {
        $is_followed = $this->user->byId($followed_id)->followers->where('id', Auth::guard('api')->user()->id)->count();
        return response()->json(['is_followed' => !!$is_followed]);
    }

    public function follow(Request $request)
    {
        $userToFollow = $this->user->byId($request->get('user_id'));
        $res = Auth::guard('api')->user()->followThisUser($userToFollow);
        return response()->json(['isFollowed' => !!$res["attached"]]);

    }

}
