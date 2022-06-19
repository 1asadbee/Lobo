<?php

namespace App\Http\Requests;

use App\Models\CustomerPostsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerPostsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_posts_description_create');
    }

    public function rules()
    {
        return [
            'customer_post_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
