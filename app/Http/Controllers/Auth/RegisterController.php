<?php

namespace App\Http\Controllers\Auth;


use App\Mailer\UserMailer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Naux\Mail\SendCloudException;
use Naux\Mail\SendCloudTemplate;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\ErrorHandler\Error\FatalError;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:16|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try{
            DB::beginTransaction();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => '/avatars/default.png',
                'confirmation_token' => str_random(40),
                'is_active' => 0,
                'password' => Hash::make($data['password']),
                'api_token' => str_random(64)
        ]);
            $this->sendVerifyEmailTo($user);
            DB::commit();
            return redirect('/register');
        }catch (\Exception $e){
            DB::rollBack();
            flash('メールは送信できませんでした!管理員と連絡してください！','warning');
            return redirect('/register');
        }
    }

    private function sendVerifyEmailTo($user)
    {

        $userMailer = new UserMailer();
        $userMailer->sendVerifyEmail($user);
    }
}
