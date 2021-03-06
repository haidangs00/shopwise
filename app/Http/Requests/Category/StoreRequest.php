<?php

namespace App\Http\Requests\Category;

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
            'name' => "required|max:255|unique:categories,name,{$this->route('category', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục sản phẩm',
            'name.unique' => 'Tên danh mục sản phẩm đã tồn tại',
            'name.max' => 'Tên danh mục sản phẩm không hợp lệ',

        ];
    }
}
