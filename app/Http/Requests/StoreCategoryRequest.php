<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|min:5',
            'file' => 'required|image',
            'keyword' => 'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên category',
            'name.min' => 'Tên brand phải có ít nhất 5 kí tự',
            'keyword.required' => 'Bạn chưa nhập keyword',
            'keyword.min' => 'Tên keyword phải có ít nhất 3 kí tự',
            'file.required' => 'Chưa chọn ảnh category',
        ];
    }
}
