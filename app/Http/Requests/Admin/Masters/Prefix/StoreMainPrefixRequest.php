<?php

namespace App\Http\Requests\Admin\Masters\Prefix;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainPrefixRequest extends FormRequest
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
            'Description' => 'required',
            'Description_regional' => 'required',
            'value' => 'required',
            'other_value' => 'required'
        ];
    }
}