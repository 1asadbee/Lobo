<?php

namespace App\Http\Requests;

use App\Models\TrailerSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTrailerSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('trailer_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:trailer_sizes,id',
        ];
    }
}
