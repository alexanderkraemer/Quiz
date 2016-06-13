<?php

use Illuminate\Database\Seeder;

class RightAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new \App\RightAnswer();
        $answer->answer_id = 2;
        $answer->save();

        $answer = new \App\RightAnswer();
        $answer->answer_id = 6;
        $answer->save();
    }
}
