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
            'content'=> 'required|min:10',
            'file' => 'required|image',
            'address' => 'required|min:5',
            'status' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên thương hiệu',
            'content.required' => 'Bạn chưa nhập thông tin thương hiệu',
            'address.required' => 'Bạn chưa nhập địa chỉ thương hiệu',
            'name.min' => 'Tên thương hiệu phải có ít nhất 3 kí tự',
            'content.min' => 'Thông tin thương hiệu phải có ít nhất 10 kí tự',
            'address.min' => 'Địa chỉ thương hiệu quá ngắn',
            'file.required' => 'Chưa chọn ảnh thương hiệu',
            'status.required' => 'Chưa nhập trạng thái của thương hiệu',
        ];
    }
}
