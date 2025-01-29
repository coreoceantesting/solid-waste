<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripSheet extends FormRequest
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
            'trip_date'=>'required',
        //    'trip_date' => 'required|date_format:Y-m-d|regex:/^\d{4}-\d{2}-\d{2}$/',
            'beat_number'=>'required',
            'vehicle_number' => 'required',
            'collection_center' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
            'entry_weight' => 'required',
            'exit_weight' => 'required',
            'total_garbage' => 'required',
            'driver_name' => 'required',
            'weight_slip_number' => 'required',
            'file_upload' => 'required',
            'waste_segregated' => 'required',
            'waste_type' => 'required',
            'volume' => 'required'
        ];
    }
}
