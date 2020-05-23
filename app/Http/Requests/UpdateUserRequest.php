<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name' => 'min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Tên người dùng phải lớn hơn 1 kí tự',
        ];
    }
}
