<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleSchedulingInformation extends FormRequest
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
        'vehicle_type' => 'required',
        'vehicle_number' => 'required',
        'schedule_form' => 'required',
        'schedule_to' => 'required',
        'recurrence' => 'required',
        'beat_number' => 'required', // Only numbers
        'employee_name' => 'required', // Only alphabets and spaces
        'waste_gen_type' => 'required', // Only alphabets and spaces
        'in_time' => 'required',
        'out_time' => 'required',
    ];
}

}
