<?php


namespace App\Mailer;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template,$email,array $data)
    {
       $content = new SendCloudTemplate($template, $data);

       Mail::raw($content, function ($message)use($email) {
            $message->from('soushin@homework.com', 'サポーター鈴ちゃん');
            $message->to($email);
        });

    }

}
