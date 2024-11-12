<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDonationRequest extends FormRequest
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
            'patient_name' => 'required|string|min:2|max:255',
            'patient_phone' => 'required|string|regex:/^[0-9]{10,15}$/',
            'patient_age' => 'required|integer|min:1|max:120',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_num' => 'required|integer|min:1',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:500',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'city_id' => 'required|exists:cities,id',
            'notes' => 'required|string|max:1000',
            'client_id' => 'required|exists:clients,id',

        ];
    }
}
