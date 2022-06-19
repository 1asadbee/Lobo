<?php

namespace App\Http\Requests;

use App\Models\VehicleType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_type_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:vehicle_types,name_uz,' . request()->route('vehicle_type')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicle_types,name_ru,' . request()->route('vehicle_type')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicle_types,name_en,' . request()->route('vehicle_type')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicle_types,name_tr,' . request()->route('vehicle_type')->id,
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
