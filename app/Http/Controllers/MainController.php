<?php

namespace App\Http\Controllers;


use App\Next;
use App\Question;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function next()
    {
        return view('next_quiz.start');
    }
    public  function  startquiz()
    {
        Session::put('nextq',1);
        Session::put('wrongans',0);
        Session::put('correctans',0);

        $q = Next::all()->first();
        return view('next_quiz.answer')->with(['q'=>$q]);

    }
    public function submitans(Request $request)
    {
        $nextq =      Session::get('nextq');
        $wrongans =   Session::get('wrongans');
        $correctans = Session::get('correctans');

        $request->validate
        ([
            'answer'=> 'required',
            'dbans' => 'required',
        ]);

        $nextq+=1;
        if ($request->dbans == $request->answer)
        {
            $correctans+=1;
        }
        else
        {
            $wrongans+=1;
        }
        Session::put("nextq",$nextq);
        Session::put("wrongans",$wrongans);
        Session::put("correctans",$correctans);

        $i=0;

        $questions = Next::all();

        foreach ($questions as $question)
        {
            $i++;
            if($questions->count() < $nextq)
            {
                return view('next_quiz.end');
            }
            if ($i==$nextq)
            {
                return view('next_quiz.answer')->with(['q'=>$question]);
            }
        }

    }
    public  function  detail(Request $request)
    {
        $score = $request->score;
        $score_int = intval($score);
        $input = array();
        $input['score'] = $score_int;

        $score_store = Score::create($input);

    }
    public function leads()
    {
        $leads = DB::table('user_scores')
                    ->join('users','user_scores.user_id','=','users.id')
                    ->join('scores','user_scores.score_id','=','scores.id')
                    ->select('users.name','users.email','scores.score','user_scores.*')
                    ->get();
        return view('next_quiz.leadboard')->with(['leads'=>$leads]);

    }

//    public function leads()
//    {
//        $leads = DB::table('scores')
//            ->join('users','scores.user_id','=','users.id')
//            ->select('users.name','users.email','scores.score')
//            ->get();
//        return view('next_quiz.leadboard')->with(['leads'=>$leads]);
//
//    }

}
