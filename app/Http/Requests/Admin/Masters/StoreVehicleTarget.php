<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleTarget extends FormRequest
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
             'target_from_date'=>'required',
             'target_to_date'=>'required',
             'vehicle_number'=>'required',
             'beat_number'=>'required',
             'garbage_volumne'=>'required'
        ];
    }
}
