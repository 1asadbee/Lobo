<?php

namespace App\Http\Requests;

use App\Models\CarrierPostsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarrierPostsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_posts_description_create');
    }

    public function rules()
    {
        return [
            'carrier_post_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
