<?php

namespace App\Http\Requests\Admin\Masters\Prefix;

use Illuminate\Foundation\Http\FormRequest;

class StorePrefixRequest extends FormRequest
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
            // 'Prefix_Name' => 'required',
            'Prefix_Name' => 'required|unique:prefixes,Prefix_Name,NULL,NULL,deleted_at,NULL',
            'Description' => 'required',
            // 'Zone' => 'required',
            'Status' => 'required'
        ];
    }
}
