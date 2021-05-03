<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users,email',
            'user_name' => 'bail|required|alpha_dash',
            'password' => 'bail|required|min:6|max:16',
            're_password' => 'bail|required|same:password',
            'phone' => 'bail|required|numeric',
            'check' => 'accepted',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',
            'name.regex' => 'Họ tên không hợp lệ',

            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',

            'user_name.required' => 'Vui lòng nhập tên đăng nhập',
            'user_name.alpha_dash' => 'Tên đăng nhập không hợp lệ',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa là 16 ký tự',

            're_password.required' => 'Vui lòng nhập lại mật khẩu',
            're_password.same' => 'Nhập lại mật khẩu không đúng',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numberic' => 'Số điện thoại không hợp lệ',

            'check.accepted' => 'Bạn chưa đồng ý với các điều khản & chính sách'
        ];
    }
}
