<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'bail|required|min:2|max:200',
            'phone' => "bail|required|unique:admins,phone,{$this->route('admin', NULL)},id",
            'email' => "bail|nullable|email|unique:admins,email,{$this->route('admin', NULL)},id",
            'user_name' => "bail|required|alpha_dash|unique:admins,user_name, {$this->route('admin', NULL)},id",
            'password' => 'bail|required|min:6|max:16',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Vui lòng nhập :attribute', ['attribute' => 'họ tên']),
            'name.min' => __(':attribute không hợp lệ', ['attribute' => 'Họ tên']),
            'name.max' => __(':attribute không hợp lệ', ['attribute' => 'Họ tên']),

            'phone.required' => __('Vui lòng nhập :attribute', ['attribute' => 'số điện thoại']),
            'phone.unique' => __(':attribute đã tồn tại', ['attribute' => 'Số điện thoại']),

            'email.email' => __(':attribute không hợp lệ.', ['attribute' => 'Email']),
            'email.unique' => __(':attribute đã tồn tại.', ['attribute' => 'Email']),

            'user_name.required' => 'Vui lòng nhập tên đăng nhập',
            'user_name.alpha_dash' => 'Tên đăng nhập không hợp lệ',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa là 16 ký tự',
        ];
    }
}
