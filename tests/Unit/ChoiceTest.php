<?php

namespace Tests\Unit;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChoiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_question()
    {
        $question = Question::factory()->create();
        $choice = Choice::factory()->create(['question_id' => $question->id]);

        $this->assertEquals($question->choices->first()->id, $choice->id);
    }
    /** @test */
    public function it_has_a_quiz()
    {
        $quiz = Quiz::factory()->create();
        $question = Question::factory()->create(['quiz_id' => $quiz->id]);
        $choice = Choice::factory()->create(['question_id' => $question->id]);

        $this->assertEquals($quiz->questions->first()->choices->first()->id, $choice->id);
    }
    /** @test */
    public function it_has_an_answer()
    {
        $choice = Choice::factory()->create();
        $answer = Answer::factory()->create(['choice_id' => $choice->id]);

        $this->assertEquals($answer->choice->id, $choice->id);
    }
}
