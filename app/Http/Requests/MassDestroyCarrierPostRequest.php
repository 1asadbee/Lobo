<?php

namespace App\Http\Requests;

use App\Models\CarrierPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarrierPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('carrier_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:carrier_posts,id',
        ];
    }
}