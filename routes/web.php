<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Models\Post;
use App\Models\Slide;
use Illuminate\Http\Request;
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
    if(empty(session('tempUser.id'))) {
        session()->put('tempUser.id', session()->getId());
    }
    $posts = Post::query()->where('active', 1)->orderByDesc('#ofCompletions')->limit(3)->get();
    $slides = Slide::query()->where('active', 1)->orderBy('position')->limit(12)->get();
    return view('home',
        [
            'posts' => $posts,
            'slides' => $slides,
        ]
    );
})->name('home');

Route::get('/posts/{pid}', [QuestionController::class, 'index'])->name('questions');

Route::post('/answers', [AnswerController::class, 'checkAnswer'])->name('checkAnswers');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/check/{pid}', [PostController::class, 'isCompleted'])->name('isCompleted');

Route::get('/token', function () {
    return csrf_token();
});

Route::get('/sessions', function (Request $request) {
    $value = session()->all();
    dd($value);
});

Route::get('/clear', function (Request $request) {
    session()->pull('completedPosts', 1);
});

Route::get('/flush', function (Request $request) {
    $request->session()->flush();
});

