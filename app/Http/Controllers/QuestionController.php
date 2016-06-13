<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\RightAnswer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();

        return view('questions.list', compact('questions'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Question::create ($request->only('question')['question']);
        $question_id = DB::getPdo()->lastInsertId();

        $rightAnswer = Input::get('rightanswer');

        $rightAnswerId = null;
        $i = 1;
        foreach($request->only('answer')['answer'] as $antwort)
        {
            $answernr = new Answer();
            $answernr->question_id = $question_id;
            $answernr->answer = $antwort;
            $answernr->save();
            if($i == $rightAnswer)
            {
                $rightAnswerId = $answernr->id;
            }
            $i++;
        }
        
        $answer = Answer::find($rightAnswerId);

        $right = new RightAnswer();
        $right->answer_id = $answer->id;
        $right->save();

        return redirect ('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
