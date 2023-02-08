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
        $assignee=User::find($this->pivot->assignee_id);
        $assignor=User::find($this->pivot->assignor_id);
        return[
            'status' => $this->name,
            'assignor' => $assignor? $assignor->name :null,
            'assignee' => $assignee? $assignee->name :null,
            'details' => $this->pivot->details,
        ];
    }
}
