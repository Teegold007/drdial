<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create(['body' => 'My name is Ben Mike and this is a reply to your question Juliet','author_id' => '1','author_role' => 'Doctor','question_id' => '1']);
        Answer::create(['body' => 'My name is Smith John and this is a reply to your question Sunday','author_id' => '2','author_role' => 'Doctor','question_id' => '2']);
        Answer::create(['body' => 'My name is Juliet and this is a reply to your question Dr Ben','author_id' => '2','author_role' => 'Patient','question_id' => '4']);
    }
}
