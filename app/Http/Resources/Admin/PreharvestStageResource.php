<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PreharvestStageResource extends JsonResource
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
            "name_ar" => $this->getTranslation('name', 'ar'),
            "name_en" => $this->getTranslation('name', 'en'),
            "active" => $this->is_active == true ? "on" : "off"
        ];
    }
}
