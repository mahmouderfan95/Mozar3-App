<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRateServiceStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'vendors' => "required|array",
            'vendors.*.id' => "required|exists:vendors,id",
            'vendors.*.rate' => "nullable|numeric|min:1|max:5",
            'vendors.*.services' => "nullable|array",
            'vendors.*.services.*.id' => "required|exists:services,id",
            'vendors.*.services.*.rate' => "nullable|numeric|min:1|max:5",
            'vendors.*.services.*.review' => "nullable|string|min:3|max:190",
        ];
    }

    public function messages()
    {
        return [
            'vendors.0.rate.min' => 'يجب أن يكون معدل تقييم البائع يساوي أو أكبر من 1.',
            'vendors.0.services.0.rate.min' => 'يجب أن يكون معدل معدل تقييم الخدمة يساوي أو أكبر من 1.',
        ];
    }
}
