<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderDetails as OrderDetailResource;
use Carbon\Carbon;

class Card extends JsonResource
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
            
            // 'order_details' => OrderDetailResource::collection($this->orderDetails)
            
            
            'user_service_number' => $this->user_service_number,
            'name' => $this->name,
            'value' => $this->value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            
        ];
    }
}
