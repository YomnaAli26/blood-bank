<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_name' => 'sometimes|string|max:255',
            'patient_phone' => 'sometimes|string|regex:/^[0-9]{10,15}$/',
            'patient_age' => 'sometimes|integer|min:1|max:120',
            'blood_type_id' => 'sometimes|exists:blood_types,id',
            'bags_num' => 'sometimes|integer|min:1',
            'hospital_name' => 'sometimes|string|max:255',
            'hospital_address' => 'sometimes|string|max:500',
            'latitude' => 'sometimes|numeric|between:-90,90',
            'longitude' => 'sometimes|numeric|between:-180,180',
            'city_id' => 'sometimes|exists:cities,id',
            'notes' => 'sometimes|string|max:1000',
            'client_id' => 'sometimes|exists:clients,id',

        ];
    }
}
