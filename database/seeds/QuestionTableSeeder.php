<?php

use Illuminate\Database\Seeder;
use App\Question;
class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create(['body' => 'My name is Juliet and i have a question for you Mr Ben Mike, please respond now.', 'author_id' => '2', 'author_role' => 'Patient', 'questionable_id' => '1', 'questionable_type' => 'App\Doctor']);
        Question::create(['body' => 'My name is Sunday and am a Patient, This question is for you Dr Smith  John', 'author_id' => '3', 'author_role' => 'Patient', 'questionable_id' => '2', 'questionable_type' => 'App\Doctor']);
        Question::create(['body' => 'My name is Lucky and this is my question for you Dr Ben Mike', 'author_id' => '1', 'author_role' => 'Patient', 'questionable_id' => '1', 'questionable_type' => 'App\Doctor']);
        Question::create(['body' => 'My name is Ben Mike and this is my question for you Juliet', 'author_id' => '1', 'author_role' => 'Doctor', 'questionable_id' => '2', 'questionable_type' => 'App\Patient']);
    }
}
