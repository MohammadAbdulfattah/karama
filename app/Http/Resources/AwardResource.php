<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AwardResource extends JsonResource
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
        return[
            'uuid' => $this->uuid,
            'name' =>$this->name,
            'image' =>$this->image,
            'description' =>$this->description,
            'type' =>$this->type,
            'season' =>$this->season->name,
            'sport' =>$this->sport->name,
        ];
    }
}
