<?php

namespace App\Http\Requests;

use App\Models\Declarant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeclarantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('declarant_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'integer',
            ],
            'declaration' => [
            ],
            'settlement_fee' => [
            ],
            'registration_certificate' => [
            ],
            'obtaining_license' => [
            ],
            'obtaining_permits' => [
            ],
            'unusual_cargo' => [
            ],
            'insurance' => [
            ],
            'status' => [
            ],
        ];
    }
}
