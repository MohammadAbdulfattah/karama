<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class lastGameResource extends JsonResource
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
            'play_ground' => $this->play_ground,
            'date' => Carbon::parse($this->when)->format('m-d D H:i'),
            'status' => $this->status,
            // 'score' => new ScoreResource($this->name),
        ];
        // return parent::toArray($request);
    }
}
