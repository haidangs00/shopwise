<?php

namespace App\Http\Requests\Product;

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
            'name' => 'bail|required|min:2|max:200',
            'category_id' => 'bail|required|exists:categories,id',
            'brand_id' => 'bail|required|exists:brands,id',
            'regular_price' => 'bail|required|numeric',
            'promotional_price' => 'bail|required|numeric',
            'description' => 'bail|nullable|max:500'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Bạn chưa nhập :attribute', ['attribute' => 'tên sản phẩm']),
            'name.min' => __(':attribute không hợp lệ', ['attribute' => 'Tên sản phẩm']),
            'name.max' => __(':attribute không hợp lệ', ['attribute' => 'Tên sản phẩm']),

            'category_id.required' => __('Bạn chưa chọn :attribute', ['attribute' => 'danh mục sản phẩm']),
            'category_id.exists' => __(':attribute không hợp lệ', ['attribute' => 'Danh mục sản phẩm']),

            'brand_id.required' => __('Bạn chưa chọn :attribute', ['attribute' => 'nhãn hàng']),
            'brand_id.exists' => __(':attribute không hợp lệ', ['attribute' => 'Nhãn hàng']),

            'regular_price.required' => __('Bạn chưa nhập :attribute', ['attribute' => 'giá gốc']),
            'regular_price.numeric' => __(':attribute không hợp lệ', ['attribute' => 'Giá gốc']),

            'promotional_price.required' => __('Bạn chưa nhập :attribute', ['attribute' => 'giá khuyến mãi']),
            'promotional_price.numeric' => __(':attribute không hợp lệ', ['attribute' => 'Giá khuyến mãi']),

            'description.max' => __(':attribute không hợp lệ', ['attribute' => 'Mô tả']),

        ];
    }
}
