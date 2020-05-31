<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageCollection;
use App\Repositories\MessageRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $message;

    /**
     * MessageController constructor.
     * @param $message
     */
    public function __construct(MessageRepositories $message)
    {
        $this->message = $message;
    }

    public function store()
    {
        $message = $this->message->create([
            'to_user_id' => request('user_id'),
            'from_user_id' => user('api')->id,
            'body' => request('body')
        ]);

        if ($message) {
            return response()->json(['isSent' => true]);
        }

        return response()->json(['isSent' => false]);
    }

    /**
     * 一対一のメッセージボックス
     * @return MessageCollection
     */
    public function index()
    {
        $user_id = request('user_id');
        $messages = $this->message->selectMessageByUser($user_id);
        return new MessageCollection($messages);
    }

    /**
     * メッセージリスト
     * to_user 受信者、即ちログインしている本人
     * from_user 送信者
     */
    public function messageList()
    {
        $message=$this->message->selectMessageByEachUser();
        return new MessageCollection($message);
    }
}
