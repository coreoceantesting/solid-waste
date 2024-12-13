<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicles extends FormRequest
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
            'waste_types' => 'required',
            'capacity_in_kg' => 'required',
            'total_capacity'=>'required',
            'Vehicle_Type' => 'required',
            'Vehicle_number' => 'required',
            'vehicle_Reg_Number'=>'required',
            'Engine_number' => 'required',
            'vehicle_standard_weight' => 'required',
            'Manufacturer' => 'required',
            'vehicle_tracking' => 'required',
            'Department_owned_vehicle' => 'required',
            'purchase_date' => 'required',
            'purchase_price' => 'required',
            'Source_of_purchase_date' => 'required',
            'Asset_code' => 'required',
            'chassis_number' => 'required',
            'Remarks' => 'required',
        ];
    }
}
