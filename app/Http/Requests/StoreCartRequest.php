<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'fullName' => 'required|min:3',
            'email'=> 'required|email',
            'address' => 'required|min:5',
            'phoneNumber' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Quý khách vui lòng điền tên người đặt hàng',
            'fullName.min' => 'Tên cần ít nhất 3 kí tự',
            'email.required' => 'Quý khách vui lòng nhập địa chỉ email',
            'email.email' => 'Quý khách chưa nhập đúng định dạng email',
            'address.required' => 'Quý khách vui lòng điền địa chỉ của người đặt hàng',
            'address.min' => 'Chưa đủ thông tin cho địa chỉ, vui lòng cung cấp thêm',
            'phoneNumber.required' => 'Vui lòng cung cấp số điện thoại người đặt hàng',
            'phoneNumber.numeric' => 'Số điện thoại cần là số và không được có khoảng trắng',
        ];
    }
}
