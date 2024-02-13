<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\playerResource;
use App\Http\Resources\playersResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Player;
use App\Models\Sport;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    use GeneralTrait;

    public function allPlayers()
    {
    }
    public function index(Request $request, $sport_uuid)
    {
        try {
            $sport = Sport::where('uuid', $sport_uuid)->first();
            $players = Player::where('sport_id', $sport->id)->orderBy('name', 'desc')->get();

            if ($players->isEmpty()) {
                return $this->requiredField("the players in this sport are not available");
            }

            $data['players'] = PlayerResource::collection($players);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse("An error occurred while fetching players: " . $th->getMessage());
        }
    }

    public function strikers()
    {
        try {
            $strikers = Player::whereIn('position', ['ST', 'SS', 'RW', 'RWF', 'LW', 'LWF', 'CF'])->get();
            $data['strikers'] = playersResource::collection($strikers);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse('an error occurred while fetching players: ' . $th->getMessage());
        }
    }

    public function midfielders()
    {
        try {
            $Midfielders = Player::where('position', 'like', '%M')->get();
            $data['Midfielders'] = playersResource::collection($Midfielders);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse('an error occurred while fetching players: ' . $th->getMessage());
        }
    }
    public function defenders()
    {
        try {
            $defenders = Player::where('position', 'like', '%B')->get();
            $data['defenders'] = playersResource::collection($defenders);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse('an error occurred while fetching players: ' . $th->getMessage());
        }
    }
    public function goalKeepers()
    {
        try {
            $goalKeepers = Player::where('position', 'GK')->get();
            $data['goalKeepers'] = playersResource::collection($goalKeepers);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse('an error occurred while fetching players: ' . $th->getMessage());
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
