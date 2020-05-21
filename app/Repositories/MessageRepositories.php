<?php


namespace App\Repositories;


use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageRepositories
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

    public function byId($id)
    {
        return Message::find($id);
    }

    public function selectMessageByUser($user_id)
    {
        $me_id=Auth::guard('api')->user()->id;
        $messages = Message::whereIn('from_user_id',[$user_id,$me_id])
            ->whereIn('to_user_id',[$user_id,$me_id])->get();

        return $messages;
    }

}
