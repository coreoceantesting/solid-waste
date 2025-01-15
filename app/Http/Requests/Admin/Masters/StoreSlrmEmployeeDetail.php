<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlrmEmployeeDetail extends FormRequest
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
            'collection_center' => 'required',
            'designation' => 'required',
            'emp_code' => [
                'required',
                'alpha_num', // Allows only alphanumeric characters (letters and numbers)
            ],
            'title' => 'required',
            'f_name' => [
                'required',
                'alpha', // Allows only alphabetic characters
            ],
            'm_name' => [
                'required',
                'alpha', // Allows only alphabetic characters
            ],
            'l_name' => [
                'required',
                'alpha', // Allows only alphabetic characters
            ],
            'gender' => 'required',
            'm_number' => [
                'required',
                'digits:10', // Must be exactly 10 digits
                'regex:/^[6-9]\d{9}$/', // Starts with 6-9 and contains exactly 10 digits
            ],
            'email_id' => [
                'required',
                'email', // Validates email format
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Strict email validation regex
            ],
            'address' => [
                'required',
                'string', // Ensures that the address is a string
                'max:255', // Limits the address length to 255 characters (you can adjust this)
                'regex:/^[a-zA-Z0-9\s,.-]+$/', // Allows letters, numbers, spaces, commas, periods, and hyphens
               ],

              'address_one' => [
              'required',
              'string', // Ensures that the address_one is a string
              'max:255', // Limits the address_one length to 255 characters (you can adjust this)
              'regex:/^[a-zA-Z0-9\s,.-]+$/', // Allows letters, numbers, spaces, commas, periods, and hyphens
               ],
            'pin_code' => [
                'required',
                'digits:6', // Must be exactly 6 digits
            ],
        ];
    }

    public function messages()
{
    return [
        'f_name.alpha' => 'The first name must only contain alphabetic characters.',
        'm_name.alpha' => 'The middle name must only contain alphabetic characters.',
        'l_name.alpha' => 'The last name must only contain alphabetic characters.',
        'email_id.email' => 'Please enter a valid email address.',
        'email_id.regex' => 'Please enter a valid email in the format: solid@domain.com.',
        'pin_code.digits' => 'The pin code must be exactly 6 digits.',
    ];
}
}
