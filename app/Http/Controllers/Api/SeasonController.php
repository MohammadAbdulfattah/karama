<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SeasonResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeasonsResource;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SeasonController extends Controller
{
    use GeneralTrait;
    public function currentSeasonDetails()
    {
        try {
            $currentYear = Carbon::now()->format('Y-m-d');
            $seasons = Season::where('start_date', '<=', $currentYear)->where('end_date', '>=', $currentYear)->get();
            $data['season'] = SeasonsResource::collection($seasons);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("".$th->getMessage(), 404);
        }
    }
}
    
