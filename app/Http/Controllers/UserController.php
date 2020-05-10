<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function follower(Request $request)
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
        $followers = $this->follower($request);
        $answers = $this->answers($request);
        return response()->json(['followers' => $followers, 'answers' => $answers]);
    }
}
