<?php

namespace Tests\Unit;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizResultTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_has_a_quiz()
    {
        $quiz = Quiz::factory()->create();
        $quizResult = QuizResult::factory()->create(['quiz_id' => $quiz->id]);

        $this->assertEquals($quiz->id, $quizResult->quiz->id);
    }

    /** @test */
    public function it_has_a_user()
    {
        $user = User::factory()->create();
        $quizResult = QuizResult::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $quizResult->user->id);
    }

    /** @test */
    public function it_has_answers()
    {
        $quizResult = QuizResult::factory()->create();
        $answers = Answer::factory(3)->create(['quiz_result_id' => $quizResult->id]);

        $this->assertEquals($answers->count(), $quizResult->answers->count());
    }

    // TODO: has a score
}
