<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{

    public function followers(Request $request)
    {
        return User::find($request->get('user_id'))->followers->count();
    }

    public function answers(Request $request)
    {
        return User::find($request->get('user_id'))->answers->count();
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
        $is_followed = User::find($followed_id)->followers->where('id', 5)->count();
        return response()->json(['is_followed' => !!$is_followed]);
    }
}
