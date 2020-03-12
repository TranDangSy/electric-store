<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'min:3',
            'content'=> 'min:10',
            'address' => 'min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Tên thương hiệu phải có ít nhất 3 kí tự',
            'content.min' => 'Thông tin thương hiệu phải có ít nhất 3 kí tự',
            'address.min' => 'Địa chỉ thương hiệu quá ngắn',
        ];
    }
}
