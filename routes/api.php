<?php

use App\Http\Controllers\Api\BossController;
use App\Http\Controllers\Api\ClotheController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\PlayerController;
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
//standings
Route::get('/standing/{season}', [StandingController::class, 'allClubsStanding']);
//statistics
Route::get('/statistic/{match}', [StatisticController::class, 'lastMatchStats']);
Route::get('/score/{match}', [StatisticController::class, 'matchScore']);
//matches
// Route::get('/liveMatch', [GameController::class, 'liveMatch']);
Route::get('/last/match', [GameController::class, 'lastMatchDetails']);
Route::get('/nextThreeMatches', [GameController::class, 'nextThreeMatches']);
Route::get('/next/match', [GameController::class, 'nextMatch']);
Route::get('/MatchByDate/{date}', [GameController::class, 'getMatchByDate']);
//season
Route::get('/season', [SeasonController::class, 'currentSeasonDetails']);
//clothes
Route::get('/clothes/{sport}', [ClotheController::class, 'currentSeasonClothes']);
//bosses
Route::get('/bosses', [BossController::class, 'allBosses']);
Route::get('/boss', [BossController::class, 'currentBoss']);
//awards
Route::get('/awards/{sport}', [PlayerController::class, 'index'])->name('allAwards');
Route::get('/club/awards', [PlayerController::class, 'clubAwards'])->name('clubAwards');
Route::get('/personal/awards', [PlayerController::class, 'personalAwards'])->name('personalAwards');
//employees
Route::get('/managers', [EmployeeController::class, 'allManagers']);
Route::get('/coaches', [EmployeeController::class, 'allCoaches']);
//players
Route::get('/players/{sport}', [PlayerController::class, 'index'])->name('allPlayers');
Route::get('/midfielders', [PlayerController::class, 'midfielders']);
Route::get('/defenders', [PlayerController::class, 'defenders']);
Route::get('/goalKeepers', [PlayerController::class, 'goalKeepers']);
Route::get('/strikers', [PlayerController::class, 'strikers']);
