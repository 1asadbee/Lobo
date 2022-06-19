<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('currency_create');
    }

    public function rules()
    {
        return [
            'name_uz' => [
                'string',
                'required',
                'unique:currencies',
            ],
            'name_ru' => [
                'string',
                'required',
                'unique:currencies',
            ],
            'name_en' => [
                'string',
                'required',
                'unique:currencies',
            ],
            'name_tr' => [
                'string',
                'required',
                'unique:currencies',
            ],
            'name_cy' => [
                'string',
                'required',
            ],
        ];
    }
}
