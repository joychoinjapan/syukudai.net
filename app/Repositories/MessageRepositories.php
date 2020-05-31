<?php


namespace App\Repositories;


use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $me_id = user('api')->id;
        $messages = Message::whereIn('from_user_id', [$user_id, $me_id])
            ->whereIn('to_user_id', [$user_id, $me_id])->get();

        return $messages;
    }

    public function selectMessageByEachUser()
    {
        $me_id = user('api')->id;
        $messages = Message::with(['fromUser', 'toUser'])
            ->where('to_user_id', $me_id)
            ->orwhere('from_user_id', $me_id)
            ->orderBy('created_at', 'desc')
            ->get();
        $chat_room_groups = [];
        $new_messages = collect();
        foreach ($messages as $message) {
            $match_ids_1 = [$message->from_user_id, $message->to_user_id];
            $match_ids_2 = [$message->to_user_id, $message->from_user_id];
            if ($new_messages->isEmpty()) {
                $new_messages->push($message);
                array_push($chat_room_groups, $match_ids_1);
            } else {
                $res = !in_array($match_ids_1, $chat_room_groups, true)
                    && !in_array($match_ids_2, $chat_room_groups, true);
                if ($res) {
                    $new_messages->push($message);
                    array_push($chat_room_groups, $match_ids_1);
                }
            }
        }
        return $new_messages;
    }

}
