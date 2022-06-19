<?php

namespace App\Http\Requests;

use App\Models\ExpensesCarrierPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpensesCarrierPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expenses_carrier_post_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'spent_coins' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'for' => [
                'string',
                'required',
            ],
            'carrier_post_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
