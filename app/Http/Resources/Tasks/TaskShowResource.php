<?php

namespace App\Http\Resources\Tasks;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskShowResource extends JsonResource
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
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'image'          => $this->image,
            'due_date'       => $this->due_date,
            'assignee'       => $this->assignee?->user->name,
            'current_status' => $this->currentStatus->name,
            'labels'         => $this->labels,
            'log'            => $this->statuses
        ];
    }
}
