<?php

namespace App\Http\Requests\Blog;

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
            'title' => 'bail|required|min:2|max:100',
            'blog_category_id' => 'bail|required|exists:blog_categories,id',
            'summary' => 'bail|required|min:2|max:200',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Bạn chưa nhập :attribute', ['attribute' => 'tiêu đề']),
            'title.min' => __(':attribute không hợp lệ', ['attribute' => 'Tiêu đề']),
            'title.max' => __(':attribute không hợp lệ', ['attribute' => 'Tiêu đề']),

            'blog_category_id.required' => __('Bạn chưa chọn :attribute', ['attribute' => 'danh mục bài viết']),
            'blog_category_id.exists' => __(':attribute không hợp lệ', ['attribute' => 'Danh mục bài viết']),

            'summary.required' => __('Bạn chưa nhập :attribute', ['attribute' => 'tóm tắt']),
            'summary.min' => __(':attribute không hợp lệ', ['attribute' => 'Tóm tắt']),
            'summary.max' => __(':attribute không hợp lệ', ['attribute' => 'Tóm tắt']),
        ];
    }
}
