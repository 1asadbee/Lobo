<?php

namespace App\Http\Requests;

use App\Models\LoadType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoadTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('load_type_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:load_types',
            ],
            'name_ru' => [
                'string',
                'required',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:load_types',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:load_types',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
        ];
    }
}
