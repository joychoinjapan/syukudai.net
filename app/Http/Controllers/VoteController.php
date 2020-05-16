<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VoteController extends Controller
{
    protected $answer;

    public function __construct(AnswerRepository $answer)
    {
        $this->answer=$answer;
    }


    //賛成済？
    public function voted($id)
    {
        if (Auth::check()) {
            $user = Auth::guard('api')->user();
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
    public function vote(){
        $answerToVote=$this->answer->byId(request('answer_id'));
        $res = Auth::guard('api')->user()->voteFor($answerToVote);
        if($res['attached']){
            $answerToVote->increment('votes_count');
        }else{
            $answerToVote->decrement('votes_count');
        }
        return response()->json(['voted' => !!$res["attached"]]);

    }
}
