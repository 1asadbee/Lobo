<?php

namespace App\Http\Requests;

use App\Models\ExpensesDeclarantPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpensesDeclarantPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expenses_declarant_post_edit');
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
            'declarant_post_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
