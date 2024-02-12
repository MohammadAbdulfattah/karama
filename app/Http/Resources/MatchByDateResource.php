<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchByDateResource extends JsonResource
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
            'uuid' => $this->uuid,
            'date' => Carbon::parse($this->when)->format('Y-m-d D'),
            'hour' => Carbon::parse($this->when)->format('H:i A'),
            'play ground' => $this->play_ground,
            'round' => $this->round,

        ];
        // return parent::toArray($request);
    }
}
