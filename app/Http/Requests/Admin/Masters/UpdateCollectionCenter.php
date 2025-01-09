<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollectionCenter extends FormRequest
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
            'p_name' => 'required',
            'p_cat' => 'required',
            'd_of_op' => 'required',
            'decentral' => 'required',
            'p_own' => 'required',
            'location' => 'required',
            'p_capacity' => 'required',
            'inte_with_plant' => 'required',
            'inte_with_id' => 'required',
            'wtc' => 'required',
            'rdf' => 'required',
            'inte_c_t' => 'required',
            'Arrangement' => 'required',
            'pro_num' => 'required',
            'p_views' => 'required',
            'm_views' => 'required',
            'p_code' => 'required',
            'p_cost' => 'required',
            'p_prog' => 'required',
            'a_code' => 'required'
        ];

    }
}
