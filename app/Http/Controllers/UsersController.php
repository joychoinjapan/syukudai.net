<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('img');
        $filename = md5(time() . user()->id) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('avatars'), $filename);

        user()->avatar = '/avatars/' . $filename;
        user()->save();

        return ['url' => user()->avatar];
    }

    /**
     * ユーザー名重複チェック
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function check(Request $request)
    {
        $user_id = $request->get('user_id');
        $name = $request->get('name');
        $count = User::where('id','<>',$user_id)->where('name',$name)->count();
        return response()->json([
            "result"=>!!$count
        ]);
    }
}
