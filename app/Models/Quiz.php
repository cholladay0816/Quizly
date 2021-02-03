<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function takers()
    {
        return $this->results->map(function ($result) {
            return $result->user;
        });
    }

    // For relationship uniformity (doesn't require () for function call)
    public function getTakersAttribute()
    {
        return $this->takers();
    }

    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }
}
