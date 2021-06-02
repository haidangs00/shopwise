<?php

namespace App\Http\Requests\BlogCategory;

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
            'name' => "required|max:255|unique:blog_categories,name,{$this->route('blogCategory', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên danh mục bài viết',
            'name.unique' => 'Tên danh mục bài viết đã tồn tại',
            'name.max' => 'Tên danh mục bài viết không hợp lệ',

        ];
    }
}
