<?php

namespace App\Http\Requests;

use App\Models\ExpensesCustomerPost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpensesCustomerPostRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('expenses_customer_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expenses_customer_posts,id',
        ];
    }
}
