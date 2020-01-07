<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'file' => 'required|image',
            'gender' => 'required',
            'level' => 'required',
            'status' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên admin',
            'name.min' => 'Tên admin phải có ít nhất 3 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Password có ít nhất 3 kí tự',
            'password.max' => 'Password chỉ có tối đa 32 kí tự',
            'file.required' => 'Chưa chọn ảnh đại diện',
            'gender.required' => 'Chưa nhập giới tính',
            'level.required' => 'Chưa nhập level',
            'status.required' => 'Chưa nhập trạng thái của user',
        ];
    }
}
