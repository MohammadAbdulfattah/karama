<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StandingResource;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Standing;

class StandingController extends Controller
{
    use GeneralTrait;
    public function allClubsStanding(Request $request, $season_id)
    {
        $standing = Standing::where('season_id', $season_id)->orderBy('points','desc')->get();
        if (!$standing) {
            return $this->requiredField("the standing for this season is not available");
        }
        $data = StandingResource::collection($standing);
        return $this->apiResponse($data);
    }
    public function create(Request $request){
    }
    public function store(Request $request){
    }
}
