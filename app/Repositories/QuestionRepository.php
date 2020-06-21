<?php


namespace App\Repositories;
use App\Question;
use App\Topic;

class QuestionRepository
{
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::where('id',$id)->with('topics','answers','followers')->first();
    }

    public function create(array $attributes)
    {
        return Question::create($attributes);
    }

    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if (is_numeric($topic["id"])) {
                Topic::find($topic["id"])->increment('questions_count');
                return (int)$topic["id"];
            }

            $is_exist_id=Topic::where('name',$topic['name'])->value('id');
            if($is_exist_id){
                Topic::find($is_exist_id)->increment('questions_count');
                return $is_exist_id;
            }

            $newTopic = Topic::create(['name' => $topic["name"], 'questions_count' => 1]);
            return $newTopic->id;
        })->toArray();
    }

    public function byId($id)
    {
        return Question::find($id);
    }

    public function getQuestionsFeed()
    {
        return Question::published()->latest('updated_at')->with('user')->get();
    }


    public function withComment($id)
    {
        return Question::with('comments', 'comments.user')->where('id', $id)->first();
    }

}
