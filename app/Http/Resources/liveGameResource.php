<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class liveGameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $now = Carbon::now()->format('m-d D H:i');
        $matchStart = Carbon::parse($this->when)->format('m-d D H:i');
        return[
        ];
        /*
        public function toArray($request){
    $now = Car::now();
    $matchStart = Carbonparse($this->when
    $matchEnd = $matchStart->copy()->addMinutes(90);

    $diffFirstHalf = $now->diffInMinutes($matchStart->addMinutes(45));
    $diffSecondHalf = $now->diffInMinutes($matchStart->addMinutes(90));

    if ($matchEnd->isPast()) {
        // Match is finished
        return [
            'play_ground' => $this->play_ground,
            'status' => $this->status,
            'date' => $matchStart->format('m-d D H:i'),
            'live_time' => 'Finished',
            'result' => $this->result,
        ];
    }

    if ($diffFirstHalf >= 0 && $diffFirstHalf < 45) {
        // First half
        return [
            'play_ground' => $this->play_ground,
            'status' => $this->status,
            'date' => $matchStart->format('m-d D H:i'),
            'live_time' => 'First Half',
        ];
    }

    if ($diffSecondHalf >= 0 && $diffSecondHalf < 90) {
        // Second half
        return [
            'play_ground' => $this->play_ground,
            'status' => $this->status,
            'date' => $matchStart->format('m-d D H:i'),
            'live_time' => 'Second Half',
        ];
    }

    // Match has not started yet
    return [
        'play_ground' => $this->play_ground,
        'status' => $this->status,
        'date' => $matchStart->format('m-d D H:i'),
        'live_time' => 'Not Started',
    ];
}*/
    }
}
