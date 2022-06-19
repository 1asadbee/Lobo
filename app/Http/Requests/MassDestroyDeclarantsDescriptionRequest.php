<?php

namespace App\Http\Requests;

use App\Models\DeclarantsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDeclarantsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('declarants_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:declarants_descriptions,id',
        ];
    }
}
