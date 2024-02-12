<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
