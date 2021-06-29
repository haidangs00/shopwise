<?php

namespace App\Http\Requests\Payment;

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
            'name' => "required|max:255|unique:payments,name,{$this->route('payment', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên phương thức thanh toán',
            'name.unique' => 'Tên phương thức thanh toán đã tồn tại',
            'name.max' => 'Tên phương thức thanh toán không hợp lệ',

        ];
    }
}
