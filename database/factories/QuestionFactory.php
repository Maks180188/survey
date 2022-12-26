<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
//    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'survey_id' => Survey::inRandomOrder()->first()->id,
            'value' => $this->faker->text(100),
        ];
    }
}
