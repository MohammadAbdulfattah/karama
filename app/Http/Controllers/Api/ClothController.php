<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\clothesResource;
use App\Models\Clothe;
use App\Models\Season;
use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class ClothController extends Controller
{
    use GeneralTrait;
    public function currentSeasonClothes($sport_uuid)
    {
        try {
            $sport = Sport::where('uuid', $sport_uuid)->first();
            $season = Season::orderBy('start_date', 'Desc')->first();
            $clothes = Clothe::where('season_id', $season->id)->where('sport_id', $sport->id)->get();
            $data['clothes'] = clothesResource::collection($clothes);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Not Found", 404);
        }
    }
}
