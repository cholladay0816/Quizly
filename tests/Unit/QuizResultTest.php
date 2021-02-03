<?php

namespace Tests\Unit;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
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
    /** @test */
    public function it_has_a_score()
    {
        $quiz = Quiz::factory()->create();
        $questions = Question::factory(2)->create(['quiz_id' => $quiz->id]);
        $correct = 1;
        foreach ($questions as $question)
        {
            Choice::factory(2)->create(['question_id' => $question->id, 'correct' => $correct]);
            $correct--;
        }
        $quizResult = QuizResult::factory()->create(['quiz_id' => $quiz->id]);
        $pick = 0;
        foreach ($questions as $question)
        {
            Answer::factory()->create(['quiz_result_id' => $quizResult->id, 'choice_id' => $question->choices[$pick]->id]);
            $pick++;
        }
        $this->assertEquals(50, $quizResult->score());
    }
}
