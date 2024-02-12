<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClubResource;
use App\Http\Resources\ScoreResource;
use App\Http\Resources\StatisticResource;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use App\Models\Club;
use App\Models\Statistic;

class StatisticController extends Controller
{
    use GeneralTrait;
    private function getClub($id)
    {
        try {
            $club = Club::findOrFail($id);
            return ClubResource::make($club);
        } catch (\Exception $e) {
            return $this->errorResponse("club not found", 404);
        }
    }

    public function lastMatchStats(Request $request, $match_uuid)
    {
        try {
            $match = Game::where('uuid', $match_uuid)->first();
            $statistics = Statistic::where('game_id', $match->id)->get();
            $data['statistics'] = StatisticResource::collection($statistics);
            $game = Game::findOrFail($match->id);
            $data['firstClub'] = $this->getClub($game->club1_id);
            $data['secondeClub'] = $this->getClub($game->club2_id);
            return $this->apiResponse($data);
        } catch (\Exception $e) {
            return $this->errorResponse("match not found", 404);
        }
    }

    public function matchScore(Request $request, $match_uuid)
    {
        try {
            $match = Game::where('uuid', $match_uuid)->first();
            $score = Statistic::where('game_id', $match->id)->where('name', 'score')->get();
            $data['score'] = ScoreResource::collection($score);
            $game = Game::findOrFail($match->id);
            $data['firstClub'] = $this->getClub($game->club1_id);
            $data['secondeClub'] = $this->getClub($game->club2_id);
            return $this->apiResponse($data);
        } catch (\Exception $e) {
            return $this->errorResponse("match not found", 404);
        }
    }
}
