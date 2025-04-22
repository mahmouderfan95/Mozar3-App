<?php

namespace App\Http\Resources\Api;

use App\Enums\AppointmentTimes;
use App\Models\PostHarvestServicesDepartmentField;
use App\Models\ServiceField;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceAppointmentResource extends JsonResource
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
            "id" => $this->id,
            "time_number" => $this->time_slot,
            "time_name" => AppointmentTimes::getStatus($this->time_slot),
            "capacity" => $this->capacity,
        ];
    }
}
