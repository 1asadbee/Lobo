<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_create');
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
                'unique:vehicles',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
