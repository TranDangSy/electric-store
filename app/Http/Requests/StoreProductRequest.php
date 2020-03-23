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
            'quantity' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
            'category_id' => 'required',
            'brand_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'file.required' => 'Chưa chọn ảnh sản phẩm',
            'quantity.required' => 'Chưa nhập số lượng của sản phẩm',
            'quantity.min' => 'Số lượng không được âm',
            'quantity.integer' => 'Số lượng phải là số',
            'price.required' => 'Chưa nhập giá sản phẩm',
            'price.integer' => 'Giá phải là số',
            'price.min' => 'Giá không được âm',
            'category_id.required' => 'Chưa chọn loại sản phẩm',
            'brand_id.required' => 'Chưa chọn thương hiệu',
        ];
    }
}
