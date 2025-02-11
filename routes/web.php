<?php

use App\Http\Controllers\SoccerController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SoccerController::class, 'listCompetitions'])->name('form');
Route::get('/leagues', [SoccerController::class, 'leagues']);
Route::get('/matches', [SoccerController::class, 'showMatches'])->name('matches.show');
