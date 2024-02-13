<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class playersResource extends JsonResource
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
            'height' => $this->height . ' CM',
            'number' => $this->number,
            'position' => $this->position,
            'age' => Carbon::parse(Carbon::now())->diff(Carbon::parse($this->born))->y,
        ];
        // return parent::toArray($request);
    }
}
