<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'status' => $this->status,
            'firstClub' => $this->club1->name,
            'firstClubLogo' => $this->club1->logo,
            'SecondeClub' => $this->club2->name,
            'SecondeClubLogo' => $this->club2->logo,
            'play_ground' => $this->play_ground,
            'date' => $this->when,
        ];
        // return parent::toArray($request);
    }
}
