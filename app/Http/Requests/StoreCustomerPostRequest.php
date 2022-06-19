<?php

namespace App\Http\Requests;

use App\Models\CustomerPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_post_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'from_id' => [
                'required',
                'integer',
            ],
            'to_id' => [
                'required',
                'integer',
            ],
            'from_city' => [
                'string',
                'required',
            ],
            'to_city' => [
                'string',
                'required',
            ],
            'delivery_type_id' => [
                'required',
                'integer',
            ],
            'vehicle_type_id' => [
                'required',
                'integer',
            ],
            'load' => [
                'string',
                'required',
            ],
            'load_type_id' => [
                'required',
                'integer',
            ],
            'weight' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'area' => [
                'string',
                'max:30',
                'nullable',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'price' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'currency_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
