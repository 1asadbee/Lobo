<?php

namespace App\Http\Requests;

use App\Models\ExpensesDeclarantPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpensesDeclarantPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('expenses_declarant_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expenses_declarant_posts,id',
        ];
    }
}
