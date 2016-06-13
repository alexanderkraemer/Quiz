<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Http\Requests;
use App\Question;
use App\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionNotAnsweredCorrectly = Question::whereExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('useranswer')
                  ->whereRaw('useranswer.user_id = ' . Auth::user()->id)
                  ->whereRaw('useranswer.question_id = questions.id')
                  ->whereRaw('useranswer.correct = 1');
        })->get();


        $falseCount = count($questionNotAnsweredCorrectly);
        $questCount = count(Question::get());

        return view('home', compact('questCount', 'falseCount'));
    }

    /**
     * Show the full test.
     *
     * @return \Illuminate\Http\Response
     */
    public function full()
    {
        $question = Question::orderByRaw('Rand()')->first();

        $answers = Answer::where('question_id', '=', $question->id)->get();


        $myArr = [];
        foreach($answers as $answer)
        {
            $myArr[] = $answer;
        }
        $answers = $myArr;

        shuffle ( $answers );
        return view('fulltest', compact('question', 'answers'));
    }

    /**
     * Show the full test.
     *
     * @return \Illuminate\Http\Response
     */
    public function fullWrong()
    {
        $question = Question::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('useranswer')
                  ->whereRaw('useranswer.user_id = ' . Auth::user()->id)
                  ->whereRaw('useranswer.question_id = questions.id')
                  ->whereRaw('useranswer.correct = 0');
        })->orderByRaw('Rand()')->first();



        $answers = Answer::where('question_id', '=', $question->id)->get();


        $myArr = [];
        foreach($answers as $answer)
        {
            $myArr[] = $answer;
        }
        $answers = $myArr;

        shuffle ( $answers );
        return view('fulltest', compact('question', 'answers'));
    }

    public function twenty($start)
    {
        $max = Question::orderBy('id', 'desc')->first()->id;
        if($start > $max)
        {
            return view('nomorequestions');
        }

        if($start < Question::first()->id)
        {
            $start = Question::first()->id;
        }

        /*
        ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('useranswer')
                      ->whereRaw('useranswer.user_id = ' . Auth::user()->id)
                      ->whereRaw('useranswer.question_id = questions.id')
                      ->whereRaw('useranswer.correct = 1');
            })
        */
        $question = DB::table('questions')
            ->where('questions.id', '>=', $start)
            ->where('questions.id', '<=', $max)
            ->orderByRaw('Rand()')
            ->first();

        $answers = Answer::where('question_id', '=', $question->id)->get();


        $myArr = [];
        foreach($answers as $answer)
        {
            $myArr[] = $answer;
        }
        $answers = $myArr;

        shuffle ( $answers );
        return view('twenty', compact('question', 'answers', 'start'));
    }

    public function checkAnswer(Request $request)
    {
        $questionId = Input::get('question');
        $answerId = Input::get('answer');

        $rightAnswer = Answer::where('question_id', '=', $questionId)
                             ->whereExists(function ($query) {
                                 $query->select(DB::raw(1))
                                       ->from('rightanswers')
                                       ->whereRaw('answer_id = id');
                             })->first()->id;


        $userAnswer = new UserAnswer();
        $userAnswer->user_id = Auth::user()->id;
        $userAnswer->question_id = $questionId;
        $userAnswer->answer_id = $answerId;
        $userAnswer->correct = ($rightAnswer == $answerId);
        $userAnswer->save();


        $retAnswerArr = [];
        foreach($request->only('answers')['answers'] as $key=>$value)
        {
            $ans = Answer::find($key);
            $retAnswerArr[] = $ans;
        }


        return Redirect::back()->with('rightAnswer', $rightAnswer)->with('retArr', $retAnswerArr)->with('selectedAnswer', $answerId);
    }
}
