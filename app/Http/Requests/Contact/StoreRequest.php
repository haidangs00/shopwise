<?php

namespace App\Http\Requests\Contact;

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
            'name' => 'bail|required',
            'email' => 'bail|required|email',
            'phone' => 'bail|required|numeric',
            'message' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ tên',

            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',

            'message.required' => 'Vui lòng nhập nội dung tin nhắn',
        ];
    }
}
