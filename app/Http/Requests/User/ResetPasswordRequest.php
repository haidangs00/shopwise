<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'new_password' => 'bail|required|min:6|max:16',
            're_new_password' => 'bail|required|min:6|max:16|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Vui lòng nhập mật khẩu',
            'new_password.min' => 'Mật khẩu phải tối thiểu 6 ký tự',
            'new_password.max' => 'Mật khẩu tối đa là 16 ký tự',

            're_new_password.required' => 'Vui lòng nhập lại mật khẩu',
            're_new_password.same' => 'Nhập lại mật khẩu không đúng',
        ];
    }
}
