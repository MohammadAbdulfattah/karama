<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StandingResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Standing;

class StandingController extends Controller
{
    use GeneralTrait;
    public function allClubsStanding(Request $request, $season_uuid)
    {
        $season = Season::where('uuid', $season_uuid)->first();
        $standing = Standing::where('season_id', $season->id)->orderBy('points','desc')->get();
        if (!$standing) {
            return $this->requiredField("the standing for this season is not available");
        }
        $data = StandingResource::collection($standing);
        return $this->apiResponse($data);
    }
}
