<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BossesResource extends JsonResource
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
            'name' => $this->name,
            'Year' => $this->start_year,
            'image' => $this->image
        ];
        // return parent::toArray($request);
    }
}
