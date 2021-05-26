<?php

namespace App\Http\Requests\Banner;

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
            'name' => "required|max:255|unique:banners,name,{$this->route('banner', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên banner',
            'name.unique' => 'Tên banner đã tồn tại',
            'name.max' => 'Tên banner không hợp lệ',

        ];
    }
}
