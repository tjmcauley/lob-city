<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teams', [TeamController::class, 'index']);

Route::get('/teams/{id}', [TeamController::class, 'show'])->name('teams.show');