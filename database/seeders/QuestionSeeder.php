<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\SubQuestion;
use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class QuestionSeeder extends Seeder
{
    use WithFaker;
    public function __construct()
    {
        $this->setUpFaker();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createQuestion();
        $this->createQuestion();
    }

    public function createQuestion()
    {
        $question = Question::
        create([
            'survey_id' => Survey::inRandomOrder()->first()->id,
            'survey_question_sequence_number' => $this->faker->unique()->numberBetween(1, 20),
            'value' => $this->faker->text(100),
        ]);
        $this->makeSubQuestion($question);
        $this->makeSubQuestion($question);


    }

    public function makeSubQuestion(Question $question)
    {
        $question->subQuestions()->create([
            'survey_id' => $question->survey_id,
            'parent_id' => $question->id,
            'survey_question_sequence_number' => $this->faker->unique()->numberBetween(1, 10),
            'value' => $this->faker->text(100),
        ]);
    }
}
