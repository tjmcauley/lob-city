<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');

Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

Route::post('/teams',[TeamController::class, 'store'])->name('teams.store');

Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');