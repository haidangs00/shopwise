<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'user_name' => 'bail|required',
            'password' => 'bail|required',

        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Vui lòng nhập tên đăng nhập',
//            'user_name.regex' => 'Tên đăng nhập không hợp lệ',

            'password.required' => 'Vui lòng nhập mật khẩu'
        ];
    }
}
