<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\QuoteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['guest', 'throttle:3'])->group(function () {
    Route::post('/token', [\App\Http\Controllers\UserController::class, 'getToken'])->name('user.get_token');
});

Route::middleware(['auth:sanctum', 'throttle:' . config('api.requests_per_minute')])->group(function () {
    // Episodes
    Route::get('/episodes/', [EpisodeController::class, 'index']);
    Route::get('/episodes/{id}', [EpisodeController::class, 'show']);

    // Characters
    Route::get('/characters/', [CharacterController::class, 'index']); // ?name={name}
    Route::get('/characters/random', [CharacterController::class, 'getRandomInstance']);

    // Quotes
    Route::get('/quotes', [QuoteController::class, 'index']);
    Route::get('/quotes/random', [QuoteController::class, 'getRandomInstance']); // ?author={character_name}
});


