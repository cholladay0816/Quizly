<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/quizzes/create', [\App\Http\Controllers\QuizController::class, 'create'])
        ->name('quizzes.create');
    Route::get('/quizzes/{quiz}', [\App\Http\Controllers\QuizController::class, 'show'])
        ->name('quizzes.show');


});
