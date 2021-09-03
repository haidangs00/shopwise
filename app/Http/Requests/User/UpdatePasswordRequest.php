<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'bail|required|min:6|max:16',
            'npassword' => 'bail|required|min:6|max:16',
            'cpassword' => 'bail|required|same:npassword'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'password.min' => 'Mật khẩu phải tối thiểu 6 ký tự',
            'password.max' => 'Mật khẩu tối đa là 16 ký tự',

            'npassword.required' => 'Vui lòng nhập mật khẩu mới',
            'npassword.min' => 'Mật khẩu phải tối thiểu 6 ký tự',
            'npassword.max' => 'Mật khẩu tối đa là 16 ký tự',

            'cpassword.required' => 'Vui lòng xác nhận lại mật khẩu',
            'cpassword.same' => 'Xác nhận mật khẩu không đúng'

        ];
    }
}
