<?php

use App\Http\Controllers\Api\ClothController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\StandingController;
use App\Http\Controllers\Api\StatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/standing/{season}', [StandingController::class, 'allClubsStanding']);
Route::get('/statistic/{match}', [StatisticController::class, 'lastMatchStats']);
Route::get('/score/{match}', [StatisticController::class, 'matchScore']);
Route::get('/nextThreeMatches', [GameController::class, 'nextThreeMatches']);
Route::get('/nextMatch', [GameController::class, 'nextMatch']);
Route::get('/lastMatch', [GameController::class, 'lastMatchDetails']);
Route::get('/liveMatch', [GameController::class, 'liveMatch']);
Route::get('/getMatchByDate/{date}', [GameController::class, 'getMatchByDate']);
Route::get('/clothes/{sport}', [ClothController::class, 'currentSeasonClothes']);
Route::get('/season', [SeasonController::class, 'currentSeasonDetails']);
// Route::get('/nextThreeMatches', [GameController::class, 'nextThreeMatches']);
