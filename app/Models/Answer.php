<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function quiz()
    {
        return $this->quizResult->quiz;
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
