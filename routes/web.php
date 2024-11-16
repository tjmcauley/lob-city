<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CityController;

Route::get('/', function () {
    return view('home');
});

# City routes
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');

Route::get('/cities/{city}', [CityController::class, 'show'])->name('cities.show');

# Team routes
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

Route::post('/teams',[TeamController::class, 'store'])->name('teams.store');

Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');

Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
