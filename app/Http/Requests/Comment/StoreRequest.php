<?php

namespace App\Http\Requests\Comment;

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
            'reply_comment' => 'bail|required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'reply_comment.required' => 'Vui lòng nhập nội dung',
            'reply_comment.min' => 'Tối thiểu 2 ký tự',

        ];
    }
}
