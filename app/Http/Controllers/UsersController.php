<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserRequest;
use App\Repositories\UserRepository;
use App\User;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userRespository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRespository = $userRepository;
    }

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
        $count = User::where('id', '<>', $user_id)->where('name', $name)->count();
        return response()->json([
            "result" => !!$count
        ]);
    }

    public function profileUpdate(CheckUserRequest $request)
    {
        try {
            $user = $this->userRespository->byId($request->get('user_id'));
            $user->update([
                'name' => $request->get('name'),
                'self_introduction' => $request->get('self_introduction'),
                'company' => $request->get('company'),
                'address' => $request->get('address')
            ]);
        } catch (QueryException $exception) {
            return response()->json(array(
                'status' => 2,
                'msg' => 'Fail'
            ));
        }

        return response()->json(array(
            'status' => 1,
            'msg' => 'Success'
        ));

    }
}
