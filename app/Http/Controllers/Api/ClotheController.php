<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\clothesResource;
use App\Models\Clothe;
use App\Models\Season;
use App\Models\Sport;
use App\Http\Traits\GeneralTrait;
class ClotheController extends Controller
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
            return $this->errorResponse('the clothes image is not available : '.$th->getMessage(), 404);

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

