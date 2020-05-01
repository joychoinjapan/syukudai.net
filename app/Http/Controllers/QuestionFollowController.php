<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionFollowController extends Controller
{
    public function follow($question)
    {
        Question::find($question)->increment('followers_count');
        Auth::user()->followThis($question);
        return back();
    }

    public function unfollow($question)
    {
        Question::find($question)->decrement('followers_count');
        Auth::user()->followThis($question);
        return back();
    }

}
