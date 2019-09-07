<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Occupation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'occupation' => explode(' ', $this->occupation, 2)[1],
        ];
    }
}
