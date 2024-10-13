<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'birth_of_date'=>$this->b_o_d,
            'last_donation_date'=>$this->last_donation_date,
            'city'=>CityResource::make($this->city),
            'blood_type'=>BloodTypeResource::make($this->bloodType),
        ];
    }
}
