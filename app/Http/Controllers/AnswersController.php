<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswersRequest;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    protected $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository=$answerRepository;
    }

    public function store(StoreAnswersRequest $request,$question)
    {
       $answer=$this->answerRepository->create([
               'question_id' =>$question,
               'user_id' =>Auth::id(),
               'content' =>$request->get('content')
           ]);
        $answer->question->increment('answers_count');

        return redirect('/questions/'.$question);
    }
}
