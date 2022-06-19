<?php

namespace App\Http\Requests;

use App\Models\TrailerSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrailerSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trailer_size_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'weight' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'height' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'width' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'length' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
