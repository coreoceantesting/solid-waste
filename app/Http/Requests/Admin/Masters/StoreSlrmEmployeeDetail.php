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
            'collection_center'=>'required',
            'designation'=>'required',
            'emp_code' => 'required',
            'title' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'm_number' => 'required',
            'email_id' => 'required',
            'address' => 'required',
            'address_one' => 'required',
            'pin_code' => 'required'
        ];
    }
}
