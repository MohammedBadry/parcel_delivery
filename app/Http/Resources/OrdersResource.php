<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
            'parcel_description' => $this->parcel_description,
            'pickup_address' => $this->pickup_address,
            'drop_address' => $this->drop_address,
            'pickup_time' => $this->pickup_time,
            'drop_time' => $this->drop_time,
            'user' => $this->user,
            'biker' => $this->biker,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
