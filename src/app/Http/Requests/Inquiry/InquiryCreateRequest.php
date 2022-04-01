<?php

namespace App\Http\Requests\Inquiry;

use Illuminate\Foundation\Http\FormRequest;

class InquiryCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'model' => 'required|max:100',
            'description' => 'required|string',
            'measure' => ['required', 'exists:App\Models\Measure,name'],
            'quantity' => 'required|numeric',
        ];
    }
}
