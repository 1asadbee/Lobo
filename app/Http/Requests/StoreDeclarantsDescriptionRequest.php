<?php

namespace App\Http\Requests;

use App\Models\DeclarantsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDeclarantsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('declarants_description_create');
    }

    public function rules()
    {
        return [
            'declarant_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
