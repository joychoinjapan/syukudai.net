<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Http\Resources\CommentCollection;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function answers($id)
    {
        $answer = Answer::with('comments', 'comments.user')->where('id', $id)->first();
        return new CommentCollection($answer->comments);
    }

    public function questions($id)
    {
        $question = Question::with('comments', 'comments.user')->where('id', $id)->first();
        return new CommentCollection($question->comments);
    }

    public function store(Request $request)
    {
        $model = $this->getModelNameFromType($request->get('type'));
        $comment = Comment::create([
            'user_id' => Auth::guard('api')->user()->id,
            'body' => $request->get('body'),
            'commentable_id'=> $request->get('id'),
            'commentable_type' => $model
        ]);

        return $comment;
    }

    public function getModelNameFromType($type)
    {
        return $type === 'question'?'App\Question':'App\Answer';
    }
}

