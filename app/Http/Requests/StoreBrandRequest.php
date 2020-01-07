<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'file' => 'required|image',
            'status' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên brand',
            'name.min' => 'Tên brand phải có ít nhất 3 kí tự',
            'file.required' => 'Chưa chọn ảnh brand',
            'status.required' => 'Chưa nhập trạng thái của brand',
        ];
    }
}
