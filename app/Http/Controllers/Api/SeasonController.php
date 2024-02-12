<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonsResource;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Carbon\Carbon;

class SeasonController extends Controller
{
    use GeneralTrait;
    public function currentSeasonDetails()
    {
        try {
            $currentYear = Carbon::now()->format('Y-m-d');
            $seasons = Season::where('start_date', '<=', $currentYear)->where('end_date', '>=', $currentYear)->get();
            $data = SeasonsResource::collection($seasons);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("not Found", 404);
        }
    }
}
