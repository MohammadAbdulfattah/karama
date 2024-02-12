<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\playerResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    use GeneralTrait;

    public function allPlayers()
    {
    }
    public function index(Request $request, $sport_id)
    {
        try {
            $players = Player::where('sport_id', $sport_id)->orderBy('name', 'desc')->get();

            if ($players->isEmpty()) {
                return $this->requiredField("the players in this sport are not available");
            }

            $data = PlayerResource::collection($players);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse("An error occurred while fetching players: " . $th->getMessage());
        }
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
