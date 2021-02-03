<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->quizResult->user;
    }
    public function getUserAttribute()
    {
        return $this->user();
    }
    public function quiz()
    {
        return $this->quizResult->quiz;
    }
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
    public function quizResult()
    {
        return $this->belongsTo(QuizResult::class);
    }
    public function response()
    {
        return $this->belongsTo(Choice::class);
    }
}
