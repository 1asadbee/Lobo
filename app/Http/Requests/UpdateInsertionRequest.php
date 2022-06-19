<?php

namespace App\Http\Requests;

use App\Models\Insertion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInsertionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('insertion_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'given_money' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'currency_id' => [
                'required',
                'integer',
            ],
            'taken_coins' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
