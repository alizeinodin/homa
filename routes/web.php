<?php

use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Demo routes (no auth — portfolio / test project)
|--------------------------------------------------------------------------
*/

Route::get('/', [TweetController::class, 'index'])->name('dashboard');
Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');
Route::delete('/tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
