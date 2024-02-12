<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AwardResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Award;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use GeneralTrait;

    public function index(Request $request, $sport_id)
    {
        try {
            $awards = Award::where('sport_id', $sport_id)->get();
            if ($awards->isEmpty()) {
                return $this->requiredField("the avards in this sport are not available");
            }
            $data = AwardResource::collection($awards);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse("An error occurred while fetching awards: " . $th->getMessage());
        }
    }
    public function awardType(Request $request, $type)
    {
        try {
            $awards = Award::where('type', $type)->get();
            if ($awards->isEmpty()) {
                return $this->requiredField("the avards in this type are not available");
            }
            $data = AwardResource::collection($awards);
            return $this->apiResponse($data);
        } catch (\Throwable $th) {
            return $this->apiErrorResponse("An error occurred while fetching awards: " . $th->getMessage());
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
