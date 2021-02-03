<?php

namespace Tests\Unit;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_user()
    {
        $user = User::factory()->create();
        $quizResult = QuizResult::factory()->create(['user_id' => $user->id]);
        $answer = Answer::factory()->create(['quiz_result_id' => $quizResult->id]);

        $this->assertEquals($user->id, $answer->user->id);
    }
    /** @test */
    public function it_has_a_choice()
    {
        $choice = Choice::factory()->create();
        $answer = Answer::factory()->create(['choice_id' => $choice->id]);

        $this->assertEquals($choice->id, $answer->choice->id);
    }
    /** @test */
    public function it_has_a_question()
    {
        $question = Question::factory()->create();
        $choice = Choice::factory()->create(['question_id' => $question->id]);
        $answer = Answer::factory()->create(['choice_id' => $choice->id]);

        $this->assertEquals($question->id, $answer->question->id);
    }
    // TODO: has quiz results
}
