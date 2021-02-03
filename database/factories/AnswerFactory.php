<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\QuizResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'choice_id' => ($choice = Choice::factory()->create())->id,
            'quiz_result_id' => ($quizResult = QuizResult::factory()->create())->id,
        ];
    }
}
