<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionFollowController extends Controller
{
    public function follow(Request $request)
    {
        $question_id = \request('question');
        $user_id = \request('user');
        Question::find($question_id)->increment('followers_count');
        User::find($user_id)->followThis($question_id);
        return response()->json(['followed' => true]);
    }

    public function unfollow(Request $request)
    {
        $question_id = \request('question');
        $user_id = \request('user');
        Question::find($question_id)->decrement('followers_count');
        User::find($user_id)->followThis($question_id);
        return response()->json(['followed' => false]);
    }

}
