<?php

namespace App\Http\Requests;

use App\Models\DeclarantsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDeclarantsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('declarants_description_edit');
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
