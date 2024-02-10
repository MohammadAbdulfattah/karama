<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StandingResource extends JsonResource
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
            'club' => $this->club->name,
            'play' => $this->play,
            'win' => $this->win,
            'draw' => $this->draw,
            'lose' => $this->lose,
            'points' => $this->win * 3 + $this->draw,
            '+/-' => $this->plus_minus
        ];
        // return parent::toArray($request);
    }
}
