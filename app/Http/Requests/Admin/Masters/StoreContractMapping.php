<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractMapping extends FormRequest
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
            // 'contract_number' => 'required',
            // 'contract_name'=>'required',
            // 'contact_number'=>'required',
            // 'contract_date'=>'required',
            // 'expiry_date'=>'required',
            'contract_number' => 'required|unique:contract_mappings,contract_number,NULL,NULL,deleted_at,NULL',
            'contract_name' => 'required|unique:contract_mappings,contract_name,NULL,NULL,deleted_at,NULL',
            'contact_number'=>'required|unique:contract_mappings,contact_number,NULL,NULL,deleted_at,NULL',
            'contract_date'=>'required|unique:contract_mappings,contract_date,NULL,NULL,deleted_at,NULL',
            'expiry_date'=>'required|unique:contract_mappings,expiry_date,NULL,NULL,deleted_at,NULL',
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
