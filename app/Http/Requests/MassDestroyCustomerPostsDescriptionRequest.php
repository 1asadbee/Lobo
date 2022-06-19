<?php

namespace App\Http\Requests;

use App\Models\CustomerPostsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomerPostsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_posts_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customer_posts_descriptions,id',
        ];
    }
}
