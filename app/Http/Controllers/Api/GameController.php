<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Resources\GameResource;
use App\Http\Resources\lastGameResource;
use App\Http\Resources\liveGameResource;
use App\Http\Resources\MatchByDateResource;
use App\Http\Resources\NextGameResource;
use App\Http\Resources\ScoreResource;
use App\Http\Resources\StatisticResource;
use App\Models\Club;
use App\Models\Game;
use App\Models\Player;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class GameController extends Controller
{
    use GeneralTrait;
    public function nextThreeMatches()
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d-h-i');
            $matches = Game::where('when', '>=', $currentDate)->where('status', 'not_started')->limit(3)->get();
            $data = GameResource::collection($matches);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Not Found", 404);
        }
    }

    public function nextMatch()
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d-h-i');
            $nextMatch = Game::where('when', '>=', $currentDate)->where('status', 'not_started')->limit(1)->get();
            $data['details'] = NextGameResource::collection($nextMatch);
            $player = Player::inRandomOrder()->first();
            $data['player_image'] = $player->image;
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Not Found", 404);
        }
    }

    private function getClub($id)
    {
        try {
            $club = Club::findOrFail($id);
            return ClubResource::make($club);
        } catch (\Exception $e) {
            return $this->errorResponse("club not found", 404);
        }
    }

    public function goalScorers($match_uuid)
    {
        try {
            $match = Game::where('uuid',$match_uuid);
            $scorers = Statistic::where('game_id', $match->id)->where('name', 'goalScorers')->get();
            $data = StatisticResource::collection($scorers);
            return $data;
        } catch (\Throwable $th) {
            //throw $th;
            return $this->errorResponse("Not Found", 404);
        }
    }
    public function getMatchScore($match_uuid)
    {
        try {
            $match = Game::Where('uuid',$match_uuid)->first();
            $score = Statistic::where('game_id', $match->id)->where('name', 'score')->get();
            $data['score'] = ScoreResource::collection($score);
            $game = Game::findOrFail($match->id);
            $data['firstClub'] = $this->getClub($game->club1_id);
            $data['secondeClub'] = $this->getClub($game->club2_id);
            return $data;
        } catch (\Exception $e) {
            return $this->errorResponse("match not found", 404);
        }
    }
    public function lastMatchDetails()
    {
        try {
            $currentDate = Carbon::now()->format('Y-m-d-h-i');
            $lastMatch = Game::whereIn('status', ['live', 'finished'])->where('when', '<=', $currentDate)->orderBy('when', 'desc')->first();
            $data['lastMatch'] = lastGameResource::make($lastMatch);
            $data['score'] = $this->getMatchScore($lastMatch->id);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse('Not Found', 404);
        }
    }
    public function getMatchByDate($date) //the date format must be "Y-m-d"
    {

        try {
            $matches = Game::all();
            foreach ($matches as $match) {
                $match['when'] = Carbon::parse($match->when)->format('Y-m-d');
                if ($date == $match->when) {
                    $data['match details'] = [MatchByDateResource::make($match), $this->getMatchScore($match->id)];
                    $data['goals scorers'] = $this->goalScorers($match->id);
                    return $this->apiResponse($data);
                }
            }
        } catch (\Throwable $th) {
            return $this->errorResponse('Not Found', 404);
        }
    }

    // public function liveMatch()
    // {
    //     $liveMatch = Game::where('status', 'live')->first();
    //     $data = liveGameResource::make($liveMatch);
    //     return $this->apiResponse($data);
    // }


}
