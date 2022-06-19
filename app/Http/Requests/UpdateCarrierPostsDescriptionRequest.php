<?php

namespace App\Http\Requests;

use App\Models\CarrierPostsDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarrierPostsDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrier_posts_description_edit');
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
