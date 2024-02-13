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
        if ($this->position == "GK") {
            return [
                'uuid' => $this->uuid,
                'name' => $this->name,
                'height' => $this->height . 'CM',
                'position' => 'Goal Keeper',
                'number' => $this->number,
                'born' => $this->born,
                'from' => $this->from,
                'club' => $this->first_club,
                'career' => $this->career,
                'image' => $this->image,
                'sport' => $this->sport->name,
            ];
        }elseif (str_ends_with($this->position,'B')) {
            return [
                'uuid' => $this->uuid,
                'name' => $this->name,
                'height' => $this->height . 'CM',
                'position' => 'Defender',
                'number' => $this->number,
                'born' => $this->born,
                'from' => $this->from,
                'club' => $this->first_club,
                'career' => $this->career,
                'image' => $this->image,
                'sport' => $this->sport->name,
            ];
        }elseif (str_ends_with($this->position,'M')) {
            return [
                'uuid' => $this->uuid,
                'name' => $this->name,
                'height' => $this->height . 'CM',
                'position' => 'Midfielder',
                'number' => $this->number,
                'born' => $this->born,
                'from' => $this->from,
                'club' => $this->first_club,
                'career' => $this->career,
                'image' => $this->image,
                'sport' => $this->sport->name,
            ];
        }else{
            return [
                'uuid' => $this->uuid,
                'name' => $this->name,
                'height' => $this->height . 'CM',
                'position' => 'Striker',
                'number' => $this->number,
                'born' => $this->born,
                'from' => $this->from,
                'club' => $this->first_club,
                'career' => $this->career,
                'image' => $this->image,
                'sport' => $this->sport->name,
            ];

        }
    }
}
