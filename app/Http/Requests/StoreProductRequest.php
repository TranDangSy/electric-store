<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'quantity' => 'required',
            'price' => 'required',
            'hot' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'status' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'file.required' => 'Chưa chọn ảnh sản phẩm',
            'status.required' => 'Chưa nhập trạng thái của sản phẩm',
        ];
    }
}
