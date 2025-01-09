<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractMapping extends FormRequest
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
            'contract_number' => 'required',
            'zone' => 'required',
            'ward' => 'required',
            'colony' => 'required',
            'society' => 'required',
            'task' => 'required',
            'waste_type' => 'required',
            'garbage_volume' => 'required',
            'beat_number' => 'required',
            'employee_count' => 'required',
            'vehicle_count' => 'required'
        ];
    }
}
