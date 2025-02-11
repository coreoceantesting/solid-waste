<?php

namespace App\Http\Requests\Admin\Masters\Prefix;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrefixRequest extends FormRequest
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
     $id = $this->route('prefix'); // This should match the route parameter name in the route definition
    return [
        'Prefix_Name' => "required|unique:prefixes,Prefix_Name,$id,id,deleted_at,NULL", // Correct unique rule
        'Description' => 'required',
        'Status' => 'required',
    ];
   }

}
