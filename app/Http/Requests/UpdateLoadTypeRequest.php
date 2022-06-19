<?php

namespace App\Http\Requests;

use App\Models\LoadType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLoadTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('load_type_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:load_types,name_uz,' . request()->route('load_type')->id,
            ],
            'name_ru' => [
                'string',
                'required',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:load_types,name_en,' . request()->route('load_type')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:load_types,name_tr,' . request()->route('load_type')->id,
            ],
            'name_cy' => [
                'string',
                'required',
            ],
        ];
    }
}
