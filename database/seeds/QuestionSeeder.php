<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new \App\Question();
        $question->id = 1;
        $question->question = "Q1";
        $question->save();

        $question = new \App\Question();
        $question->id = 2;
        $question->question = "Q2";
        $question->save();
    }
}
