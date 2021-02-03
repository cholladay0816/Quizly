<?php

namespace App\Http\Livewire\Quizzes;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required',
    ];

    public function render()
    {
        return view('livewire.quizzes.create');
    }
    public function store()
    {
        if(Auth::guest())
            abort(401, 'You cannot do this as a guest.');
        $attributes = $this->validate();
        $attributes['user_id'] = Auth::user()->id;
        $quiz = Quiz::create($attributes);

        return redirect(route('quizzes.show', $quiz));
    }
}
