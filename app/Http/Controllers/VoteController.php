<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Repositories\AnswerRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VoteController extends Controller
{
    protected $answer;

    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    //賛成済？
    public function voted($id)
    {
        if (Auth::check()) {
            $user = user('api');
            if ($user->hasVotedFor($id)) {
                return response()->json(['voted' => true]);
            }
        }
        return response()->json(['voted' => false]);
    }

    //アンサーの賛成数
    public function favor($id)
    {


    }

    //アンサーを賛成する・賛成の取り消し
    public function vote()
    {
        $answerToVote = $this->answer->byId(request('answer_id'));
        $res = user('api')->voteFor($answerToVote);
        try {
            DB::beginTransaction();
            if ($res['attached']) {
                $answerToVote->increment('votes_count');
            } else {
                $answerToVote->decrement('votes_count');
            }

            $question_id = $answerToVote->question_id;
            $recommendedAnswer = $this->answer->getRecommendedAnswer($question_id);
            Answer::where('id',$recommendedAnswer->id)->where('votes_count', '>', 0)->update(['recommendation' => 'T']);
            Answer::where('question_id',$question_id)->whereNotIn('id',[$recommendedAnswer->id])->orWhere('votes_count', '=', 0)->update(['recommendation' => 'F']);

        } catch (QueryException $exception) {
            DB::rollBack();
            return response()->json([
                'result' => 'Failed',
                'voted' => !!$res["attached"]]);
        }
        DB::commit();
        return response()->json([
            'result' => 'OK',
            'voted' => !!$res["attached"]]);

    }
}
