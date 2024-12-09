<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\PlayerController;
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

# Player routes
Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create');
Route::get('/players/{player}', [PlayerController::class, 'show'])->name('players.show');
Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

# Venue routes
Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::post('/venues', [VenueController::class, 'store'])->name('venues.store');
Route::get('/venues/create', [VenueController::class, 'create'])->name('venues.create');
Route::get('/venues/{venue}', [VenueController::class, 'show'])->name('venues.show');
Route::delete('/venues/{venue}', [VenueController::class, 'destroy'])->name('venues.destroy');

# Post routes
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{user}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}/', [PostController::class, 'update'])->name('posts.update');

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
