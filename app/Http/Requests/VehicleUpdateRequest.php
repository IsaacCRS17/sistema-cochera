<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "model" => "required",
            "placa" => "required",
            "vehicletype_id" => "exists:vehicle_types,id"
        ];
    }

    public function attributes()
    {
        return [
            "model" => "modelo",
            "placa" => "placa",
            "vehicletype_id" => "Tipo de vehículo"
        ];
    }
}
