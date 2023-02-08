<?php

namespace App\Http\Resources\Activities;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'status' => $this->name,
            'assignor' => User::find($this->pivot->assignor_id)?->name,
            'assignee' => User::find($this->pivot->assignee_id)?->name,
            'details' => $this->pivot->details,
        ];
    }
}
