<?php


namespace App\Repositories;


use App\Answer;

class AnswerRepository
{
    public function create(array $attributes)
    {
        return Answer::create($attributes);
    }

    public function byId($id)
    {
        return Answer::find($id);
    }

    public function withComment($id)
    {
        return Answer::with('comments', 'comments.user')->where('id', $id)->first();
    }

    public function getRecommendedAnswer($question_id){
        return Answer::Where('question_id',$question_id)->orderBy('votes_count','desc')->first();
    }





}
