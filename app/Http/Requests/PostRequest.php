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
            'title' => 'required|max:30',
            'item' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
        ];
    }

    public function massages()
    {
        return [
            'title.required' => 'タイトルを入れてください',
            'title.unique'   => 'タイトルが被っています',
            'title.max' => 'タイトルは30文字以内で入力してください',
            'item.required' => 'アイテム名を入れてください',
            'body.required' => '使った感想を入れてください',
            'image.mimes'    => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
            'image.max'      => 'ファイルサイズを10MB以下に設定してください。',
        ];
    }
}
