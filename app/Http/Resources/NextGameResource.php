<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NextGameResource extends JsonResource
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
            'title' => 'Next Match',
            'firstClub' => $this->club1->name,
            'firstClubLogo' => $this->club1->logo,
            'SecondeClub' => $this->club2->name,
            'SecondeClubLogo' => $this->club2->logo,
            'play_ground' => $this->play_ground,
            'channel' => $this->channel,
            'date' => Carbon::parse($this->when)->format('Y-m-d D'),
            'hour' => Carbon::parse($this->when)->format('H:i A'),
            // 'hour' => $this->
        ];
        // return parent::toArray($request);
    }
}
