<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('currency_edit');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:currencies,name_uz,' . request()->route('currency')->id,
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:currencies,name_ru,' . request()->route('currency')->id,
            ],
            'name_en' => [
                'string',
                'required',
                'unique:currencies,name_en,' . request()->route('currency')->id,
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:currencies,name_tr,' . request()->route('currency')->id,
            ],
            'name_cy' => [
                'string',
                'required',
            ],
        ];
    }
}
