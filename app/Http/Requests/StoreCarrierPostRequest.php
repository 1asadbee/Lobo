<?php

namespace App\Http\Requests;

use App\Models\CarrierPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarrierPostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_post_create');
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
            'departure_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'free_weight' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'free_area' => [
                'string',
                'max:30',
                'nullable',
            ],
            'price' => [
                'nullable',
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
