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
        return 1;
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function score()
    {
        return 100;
    }

    public function incorrect()
    {
        return 0;
    }

    public function correct()
    {
        return 1;
    }
}
