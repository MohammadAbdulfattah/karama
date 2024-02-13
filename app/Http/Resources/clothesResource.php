<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class clothesResource extends JsonResource
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
            'clothes image' => $this->image,
            'sport' => $this->sport->name,
            'season' => $this->season->name
            
        ];
        // return parent::toArray($request);
    }
}
