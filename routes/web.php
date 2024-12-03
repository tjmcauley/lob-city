<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\Login;
use App\Livewire\Counter;

# Login page by default
Route::get('/', function () {
    return view('auth.login');
})->middleware(Login::class)->name('login');

# City routes
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');

Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');

# Team routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

# Post routes
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

# Comment routes
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');

# Livewire routes
Route::get('/counter', Counter::class);

# Home view once logged in
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
