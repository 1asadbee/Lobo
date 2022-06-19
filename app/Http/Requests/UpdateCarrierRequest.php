<?php

namespace App\Http\Requests;

use App\Models\Carrier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarrierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_edit');
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
                'unique:carriers,vehicle_number,' . request()->route('carrier')->id,
            ],
            'trailer_size_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
