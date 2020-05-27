<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Comment;
use App\Http\Resources\CommentCollection;
use App\Question;
use App\Repositories\AnswerRepository;
use App\Repositories\CommentRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $answerRepository;
    protected $questionRepository;
    protected $commentRepository;

    /**
     * CommentController constructor.
     * @param $answerRepository
     * @param $questionRepository
     * @param $commentRepository
     */
    public function __construct(AnswerRepository $answerRepository,QuestionRepository $questionRepository, CommentRepository $commentRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->questionRepository = $questionRepository;
        $this->commentRepository = $commentRepository;
    }


    public function answers($id)
    {
        $answer = $this->answerRepository->withComment($id);
        return new CommentCollection($answer->comments);
    }

    public function questions($id)
    {
        $question = $this->questionRepository->withComment($id);
        return new CommentCollection($question->comments);
    }

    public function store(Request $request)
    {
        $model = $this->getModelNameFromType($request->get('type'));
        $comment = $this->commentRepository->create([
            'user_id' => user('api')->id,
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

