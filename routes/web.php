<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CityController;
use App\Http\Middleware\Login;

# Login page by default
Route::get('/', function () {
    return view('auth.login');
})->middleware(Login::class)->name('login');

# City routes
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');

Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');

# Team routes
Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

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
