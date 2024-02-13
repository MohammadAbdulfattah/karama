<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BossesResource;
use App\Models\Boss;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class BossController extends Controller
{
    use GeneralTrait;
    public function allBosses()
    {
        try {
            $bosses = Boss::all();
            $data['Bosses'] = BossesResource::collection($bosses);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->errorResponse("Error in getting boss data " . $th->getMessage(), 500);
        }
    }

    public function currentBoss()
    {
        try {
            $boss = Boss::orderBy('start_year', 'Desc')->first();
            // $data['Boss'] = BossesResource::collection($boss);
            return $this->apiResponse($boss);
        } catch (\Throwable $th) {
            return $this->errorResponse("Error in getting boss data " . $th->getMessage(), 500);
        }
    }
}
