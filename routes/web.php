<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\AppController::class, 'welcome'])->name('welcome');
Route::get('/vote', [\App\Http\Controllers\AppController::class, 'voteIndex'])->name('vote');
Route::post('/vote', [\App\Http\Controllers\AppController::class, 'vote']);
Route::get('/create-person', [\App\Http\Controllers\AppController::class, 'createPersonIndex'])->name('create-person');
Route::post('/create-person', [\App\Http\Controllers\AppController::class, 'storePerson']);
Route::get('/get-results',[\App\Http\Controllers\AppController::class, 'resultsIndex'])->name('results');
