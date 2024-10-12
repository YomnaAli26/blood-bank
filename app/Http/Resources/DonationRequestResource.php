<?php

namespace App\Http\Resources;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonationRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'patient_name' =>$this->patient_name,
            'patient_phone'=>$this->patient_phone,
            'patient_age'=>$this->patient_age,
            'bloodType'=>BloodTypeResource::make($this->bloodType),
            'bags_num'=>$this->bags_num,
            'hospital_name'=>$this->hospital_name,
            'hospital_address'=>$this->hospital_address,
            'latitude'=>$this->latitude,
            'longitude'=>$this->longitude,
            'city'=>CityResource::make($this->city),
            'notes'=>$this->notes,
            'client'=>ClientResource::make($this->client),

        ];
    }
}
