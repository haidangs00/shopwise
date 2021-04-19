<?php

namespace App\Http\Requests\Color;

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
            'name' => "required|unique:colors,name,{$this->route('color', 'NULL')},id",
            'color_code' => "required|unique:colors,color_code,{$this->route('color', 'NULL')},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chua nhập tên màu',
            'name.unique' => 'Tên màu đã tồn tại',

            'color_code.required' => 'Bạn chọn mã màu',
            'color_code.unique' => 'Mã màu đã tồn tại',
        ];
    }
}
