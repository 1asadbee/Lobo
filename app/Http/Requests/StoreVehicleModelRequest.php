<?php

namespace App\Http\Requests;

use App\Models\VehicleModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_model_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:vehicle_models',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicle_models',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicle_models',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicle_models',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
