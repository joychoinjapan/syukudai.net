<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Http\Requests\StoreQuestionRequest;
use App\Question;
use App\Repositories\UserRepository;
use App\Topic;
use Cassandra\Exception\TruncateException;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\QuestionRepository;


class QuestionController extends Controller
{
    protected $questionRepository;
    protected $userRepository;

    public function __construct(QuestionRepository $questionRepository,
                                UserRepository $userRepository)
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->questionRepository = $questionRepository;
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\Http\Response;
     */
    public function index()
    {
        if(Auth::check()){
            //おすすめの質問
            $rec_questions = $this->questionRepository->getQuestionsFeed();
            //フォロー中の質問
//            $user=$this->userRepository->withFollowedQuestions(Auth::id());
//            $following_questions=$user->follow;
            $following_questions=$this->questionRepository->getFollowedQuestions(Auth::id());
            //人気の質問
            $popular_questions=$this->questionRepository->getPopularQuestions();
            return view('questions.index_edit',
                compact('rec_questions', 'following_questions', 'popular_questions'));
        }

        //todo
        return "カスタマー専用ページ";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\StoreQuestionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        try{
        $topics = $this->questionRepository->normalizeTopic($request->get('topics'));
        $data = [
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::id()
        ];
            $question = $this->questionRepository->create($data);
            $question->topics()->attach($topics);
        }catch (QueryException $exception){
            return response()->json(array(
                'status'=>2,
                'msg' => 'Fail'
            ));
        }
        return response()->json(array(
                'status'=>1,
                'msg' => 'Success',
                'question_id' =>$question->id
        ));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $question = $this->questionRepository->byIdWithTopicsAndAnswers($id);
        if (Auth::user() == null) {
            $is_followed = False;
        } else {
            $is_followed = Auth::user()->followed($id);
        }
        return view('questions.show', compact('question', 'is_followed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)) {
            return view('questions.edit', compact('question'));
        }

        return redirect('/home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, $id)
    {
        $question = $this->questionRepository->byId($id);
        $topics = $this->questionRepository->normalizeTopic($request->get('topics'));
        $question->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        $question->topics()->sync($topics);


        return redirect()->route('questions.show', [$question->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = $this->questionRepository->byId($id);
        if (Auth::user()->owns($question)) {
            $question->delete();
            return redirect('/questions');
        }
        abort(403, 'Forbidden');
    }

    public function topic(Request $request)
    {
        $topics = Topic::select(['id', 'name'])
            ->where('name', 'like', '%' . $request->query('q') . '%')
            ->get();

        return $topics;
    }

}
