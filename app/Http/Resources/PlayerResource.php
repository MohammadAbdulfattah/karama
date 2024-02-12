<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'height' => $this->height,
            'position' => $this->position,
            'number' => $this->number,
            'born' => $this->born,
            'from' => $this->from,
            'club' => $this->first_club,
            'career' => $this->career,
            'image' => $this->image,
            'sport_id' => $this->sport,
        ];
    }
}
