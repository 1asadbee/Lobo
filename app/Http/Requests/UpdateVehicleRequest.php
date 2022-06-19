<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_edit');
    }

    public function rules()
    {
        return [
            'delivery_type_id' => [
                'required',
                'integer',
            ],
            'name_uz' => [
                'string',
                'required',
                'unique:vehicles,name_uz,' . request()->route('vehicle')->id,
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicles,name_ru,' . request()->route('vehicle')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicles,name_en,' . request()->route('vehicle')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicles,name_tr,' . request()->route('vehicle')->id,
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
