<?php

namespace App\Http\Requests\Role;

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
            'name' => "bail|required|unique:roles,name,{$this->route('role', NULL)},id",
            'display_name' => "bail|required|unique:roles,display_name,{$this->route('role', NULL)},id",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Vui lòng nhập :attribute', ['attribute' => 'tên vai trò']),
            'name.unique' => __(':attribute đã tồn tại', ['attribute' => 'Tên vai trò']),

            'display_name.required' => __('Vui lòng nhập :attribute', ['attribute' => 'tên hiển thị']),
            'name.display_name' => __(':attribute đã tồn tại', ['attribute' => 'Tên hiển thị']),
        ];
    }
}
