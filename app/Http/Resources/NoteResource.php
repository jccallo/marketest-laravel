<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
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
            'id' => $this->id, 
            'customer_id' => $this->customer->id, 
            'customer' => $this->customer->name, 
            'date' => $this->date,
            'total' => $this->total,
            'items' => $this->items,
        ];
    }
}
