<?php

namespace App\Http\Requests;

use App\Models\Carrier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarrierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'vehicle_model_id' => [
                'required',
                'integer',
            ],
            'delivery_type_id' => [
                'required',
                'integer',
            ],
            'vehicle_type_id' => [
                'required',
                'integer',
            ],
            'vehicle_number' => [
                'string',
                'required',
                'unique:carriers',
            ],
            'trailer_size_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
