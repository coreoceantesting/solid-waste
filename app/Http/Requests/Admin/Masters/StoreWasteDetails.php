<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreWasteDetails extends FormRequest
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
            'inspector_name' => 'required',
            'total_garbage_collected' => 'required',
            'date' => 'required',
            'waste_type'=>'required',
            'waste_sub_type1'=>'required',
            'waste_sub_type2'=>'required',
            'volume'=>'required'
        ];
    }
}
