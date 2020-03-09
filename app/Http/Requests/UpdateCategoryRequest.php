<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'min:5',
            'detail' => 'min:5',
            'keyword' => 'min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.min' => 'Tên category phải nhiều hơn 5 kí tự',
            'detail.min' => 'Mô tả category phải nhiều hơn 5 kí tự',
            'keyword.min' => 'Keyword category phải nhiều hơn 2 kí tự',
        ];
    }
}
