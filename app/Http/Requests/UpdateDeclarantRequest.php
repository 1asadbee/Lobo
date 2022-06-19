<?php

namespace App\Http\Requests;

use App\Models\Declarant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeclarantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('declarant_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'declaration' => [
                'required',
            ],
            'settlement_fee' => [
                'required',
            ],
            'registration_certificate' => [
                'required',
            ],
            'obtaining_license' => [
                'required',
            ],
            'obtaining_permits' => [
                'required',
            ],
            'unusual_cargo' => [
                'required',
            ],
            'insurance' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
