<?php


namespace App\Channels;


use App\Notifications\NewUserFollowNotification;
use Illuminate\Notifications\Notification;

class SendcloudChannel
{
    public function send($notifiable,NewUserFollowNotification $notification)
    {
        $message = $notification->toSendCloud($notifiable);
    }

}
