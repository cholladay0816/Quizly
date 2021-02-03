<?php

namespace Tests\Unit;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_question_has_choices()
    {
        $choice = Choice::factory()->create();
        $question = Question::factory()->create();
        $question->choices->add($choice);
        $this->assertContains($choice, $question->choices);
    }

    /** @test */
    public function a_question_a_quiz()
    {
        $quiz = Quiz::factory()->create();
        $question = Question::factory()->create(['quiz_id' => $quiz]);
        $this->assertEquals($quiz->id, $question->quiz->id);
    }

    // TODO: has results
}
