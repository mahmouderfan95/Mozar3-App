<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.*' => ["required", "string", "min:3",'max:600'],
            'body.*' => ["required", "string", "min:3",'max:1000'],
            'short_desc.*' => ["required", "string", "min:3",'max:600'],
        ];
    }

}
