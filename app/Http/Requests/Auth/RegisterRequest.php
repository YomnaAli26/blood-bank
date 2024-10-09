<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Base\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,email'],
            'phone' => ['required', 'regex:/^\+2[0-9]{9,18}$/','max:20', 'unique:clients,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'b_o_d' => ['required', 'date','before_or_equal:today'],
            'last_donation_date' => ['required', 'date','before_or_equal:today'],
            'city_id' => ['required', 'exists:cities,id'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
        ];
    }
}
