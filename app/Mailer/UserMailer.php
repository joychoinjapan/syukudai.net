<?php


namespace App\Mailer;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email)
    {
        $data = [
            'url'=>'http://zhihu.test',
            'name'=>user('api')->name
        ];

        $this->sendto('Ask_User_Follower',$email,$data);

    }


    public function sendVerifyEmail(User $user)
    {
        $data = [
            'url'=>route('email.verify',['token'=>$user->confirmation_token]),
            'name'=>$user->name
        ];

        $this->sendTo('zhihu_app_register',$user->email,$data);


    }
}
