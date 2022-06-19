<?php

namespace App\Http\Requests;

use App\Models\PhoneNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhoneNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('phone_number_create');
    }

    public function rules()
    {
        return [
            'phone_number' => [
                'string',
                'required',
                'unique:phone_numbers',
            ],
        ];
    }
}
