<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new \App\Answer();
        $answer->question_id = 1;
        $answer->answer = 'a1';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 1;
        $answer->answer = 'a2';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 1;
        $answer->answer = 'a3';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 1;
        $answer->answer = 'a4';
        $answer->save();

        // new question

        $answer = new \App\Answer();
        $answer->question_id = 2;
        $answer->answer = 'a1';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 2;
        $answer->answer = 'a2';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 2;
        $answer->answer = 'a3';
        $answer->save();

        $answer = new \App\Answer();
        $answer->question_id = 2;
        $answer->answer = 'a4';
        $answer->save();
    }
}
