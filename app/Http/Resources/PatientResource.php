<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
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
            'patient_id' => $this->patient_id,
            'pet_name' => $this->pet_name,
            'status' => $this->status,
            'parent' => $this->parent,
            'breed' => $this->breed,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'contact_phone' => $this->contact_phone,
            'address' => $this->address
        ];
    }
}
