<?php

namespace App\Http\Requests;

use App\Models\LoadType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLoadTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('load_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:load_types,id',
        ];
    }
}
