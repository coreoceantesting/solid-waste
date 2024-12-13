<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreWardRequest extends FormRequest
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
            'name' => 'required',
            'beat_number' => 'required',
            'beat_name' => 'required',
            'start_point'=>'required',
            'end_point' => 'required',
            'total_distance'=>'required',
            'collection_mode' => 'required',
            'nearest_collection_center' => 'required',
            'distance_from_collection_center' => 'required',
            'beat_animal_count' => 'required',
            'estimated_number_of_house' => 'required',
            'beat_population' => 'required',
            'estimated_beat_residential_count' => 'required',
            'estimated_beat_commercial_count' => 'required',
            'estimated_establishment_count' => 'required',
        ];
    }
}
