<?php

namespace App\Http\Requests\Size;

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
            'name' => "required|unique:sizes,name,{$this->route('size', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên size',
            'name.unique' => 'Tên size đã tồn tại',

        ];
    }
}