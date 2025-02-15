<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'emp_id'=>'required',
            'emp_name'=>'required',
            'emp_dep'=>'required',
            'emp_pos'=>'required',
            'emp_contract_number'=>'required',
            'emp_email'=>'required',
            'emp_d_of_j'=>'required',
            // 'status'=>'required'
        ];
    }
}
