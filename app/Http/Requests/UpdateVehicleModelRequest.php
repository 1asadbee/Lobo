<?php

namespace App\Http\Requests;

use App\Models\VehicleModel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleModelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_model_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:vehicle_models,name_uz,' . request()->route('vehicle_model')->id,
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicle_models,name_ru,' . request()->route('vehicle_model')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicle_models,name_en,' . request()->route('vehicle_model')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicle_models,name_tr,' . request()->route('vehicle_model')->id,
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
