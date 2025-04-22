<?php

namespace App\Http\Resources;

use App\Http\Resources\Api\VendorServiceForRateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionServiceForRateResource extends JsonResource
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
            'is_rated' => $this->orderServices->filter(function($order) {
                    $vendorRated = $order?->vendor?->userVendorRates?->first();

                    return !$vendorRated || $order->services->filter(function($service) {
                        return $service?->reviews?->first();

                    })->isEmpty();

                })
                ->isEmpty(),
            'vendors' =>  VendorServiceForRateResource::collection($this->orderServices)
        ];
    }
}
