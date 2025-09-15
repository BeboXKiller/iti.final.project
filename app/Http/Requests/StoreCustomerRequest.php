<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('customer')),
            ],
            'password' => ['nullable', 'string', 'min:6'], // make nullable for edit
            'phone'    => ['required', 'string', 'regex:/^\+?[0-9]{7,15}$/'],
            'address'  => ['nullable', 'string', 'max:255'],
            'city'     => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter the first name.',
            'last_name.required'  => 'Please enter the last name.',
            'email.required'      => 'An email address is required.',
            'email.email'         => 'Please enter a valid email address.',
            'email.unique'        => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min'      => 'Password must be at least 6 characters.',
            'phone.required'    => 'Phone number is required.',
            'phone.regex'       => 'Phone number format is invalid.',
            'address.max'       => 'Address must not exceed 255 characters.',
            'city.max'          => 'City must not exceed 100 characters.',
        ];
    }
}
