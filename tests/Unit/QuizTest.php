<?php

namespace Tests\Unit;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_quiz_has_questions()
    {
        $quiz = Quiz::factory()->create();
        $questions = Question::factory(3)->create(['quiz_id' => $quiz->id]);

        $this->assertEquals($questions->count(), $quiz->questions->count());
    }

    /** @test */
    public function a_quiz_has_an_owner()
    {
        $user = User::factory()->create();
        $quiz = Quiz::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $quiz->user->id);
    }

    // TODO: has results
    // TODO: has takers
}
