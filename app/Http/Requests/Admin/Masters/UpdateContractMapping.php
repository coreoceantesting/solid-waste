<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractMapping extends FormRequest
{
    /****
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
        $id = $this->route('contract_mapping');
        return [
            //  'contract_number' => "required",
            //
            'contract_number' => "required|unique:contract_mappings,contract_number,$id,id,deleted_at,NULL",
            'contract_name' => "required|unique:contract_mappings,contract_name,$id,id,deleted_at,NULL",
            'contact_number' => "required|unique:contract_mappings,contact_number,$id,id,deleted_at,NULL",
            'contract_date' => "required|unique:contract_mappings,contract_date,$id,id,deleted_at,NULL",
            'expiry_date' => "required|unique:contract_mappings,expiry_date,$id,id,deleted_at,NULL",
            // 'contract_number'=>'required',
            // 'contract_name'=>'required',
            // 'contact_number'=>'required',
            // 'contract_date'=>'required',
            // 'expiry_date'=>'required',
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
