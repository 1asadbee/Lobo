<?php

namespace App\Http\Requests;

use App\Models\DeliveryType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeliveryTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('delivery_type_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:delivery_types,name_uz,' . request()->route('delivery_type')->id,
            ],
            'name_cy' => [
                'string',
                'required',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:delivery_types,name_ru,' . request()->route('delivery_type')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:delivery_types,name_en,' . request()->route('delivery_type')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:delivery_types,name_tr,' . request()->route('delivery_type')->id,
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
