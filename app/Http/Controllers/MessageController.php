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
            'from_user_id' => Auth::guard('api')->user()->id,
            'body' => request('body')
        ]);

        if ($message) {
            return response()->json(['isSent' => true]);
        }

        return response()->json(['isSent' => false]);
    }

    public function index()
    {
        $user_id = request('user_id');
        $messages = $this->message->selectMessageByUser($user_id);
        return new MessageCollection($messages);
    }
}
