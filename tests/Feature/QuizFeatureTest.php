<?php

namespace Tests\Feature;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class QuizFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_logged_in_user_can_create_quizzes()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('quizzes.create'))
            ->assertStatus(200);
    }
    /** @test */
    public function a_quiz_can_be_created_and_stored()
    {
        $user = User::factory()->create();

        $quiz = Quiz::factory()->make(['user_id' => $user->id]);
        $this->actingAs($user);
        Livewire::test('quizzes.create', $quiz->attributesToArray())
            ->call('store')
            ->assertRedirect(route('quizzes.show', Quiz::first()));
    }
}
