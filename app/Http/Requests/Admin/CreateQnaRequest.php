<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateQnaRequest extends FormRequest
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
            'question.*' => ["required", "string", "min:3",'max:600'],
            'answer.*' => ["required", "string", "min:3",'max:1000'],
            'faq_category_id' => ['required','exists:faq_categories,id']
        ];
    }


}
