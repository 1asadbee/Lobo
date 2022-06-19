<?php

namespace App\Http\Requests;

use App\Models\VehicleType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_type_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:vehicle_types',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicle_types',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicle_types',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicle_types',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'vehicle_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
