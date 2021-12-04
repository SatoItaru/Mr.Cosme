<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'require|max:30',
            'body' => 'required'
        ];
    }

    public function massages()
    {
        return [
            'title.required' => 'タイトルを入れてください',
            'title.max' => 'タイトルは30文字以内で入力してください',
            'body.required' => '使った感想を入れてください',
        ];
    }
}
