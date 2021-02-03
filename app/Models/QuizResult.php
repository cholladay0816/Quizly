<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->quiz->questions;
    }
    public function getQuestionsAttribute()
    {
        return $this->questions();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function score()
    {
        return ($this->correct() / $this->questions->count()) * 100;
    }

    public function incorrect()
    {
        return $this->questions->count() - $this->correct();
    }

    public function correct()
    {
        return $this->answers->where('correct', '1')->count();
    }
}
