<?php

namespace App\Http\Requests;

use App\Models\DeliveryType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeliveryTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_type_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:delivery_types',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:delivery_types',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:delivery_types',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:delivery_types',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
