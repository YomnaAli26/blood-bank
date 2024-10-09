<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('clients', 'email')->ignore($this->client)],
            'blood_type_id' => ['exists:blood_types,id'],
            'phone' => ['regex:/^\+?[0-9]+$/', 'max:20', Rule::unique('clients', 'phone')->ignore($this->client)],
            'b_o_d' => ['date', 'before_or_equal:today'],
            'last_donation_date' => ['date', 'before_or_equal:today'],
            'city_id' => ['exists:cities,id'],
            'password' => ['string', 'min:8', 'confirmed'],

        ];
    }
}
