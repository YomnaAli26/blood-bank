<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
    public function rules($id = null): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255',Rule::unique('clients','email')->ignore($id)],
            'phone' => ['sometimes', 'string', 'max:255', Rule::unique('clients','phone')->ignore($id)],
            'b_o_d' => ['sometimes', 'date','before_or_equal:today'],
            'last_donation_date' => ['sometimes', 'date','before_or_equal:today'],
            'city_id' => ['sometimes','exists:cities,id'],
            'blood_type_id' => ['sometimes','exists:blood_types,id'],
            'is_active' => ['sometimes','boolean'],

        ];
    }
}
