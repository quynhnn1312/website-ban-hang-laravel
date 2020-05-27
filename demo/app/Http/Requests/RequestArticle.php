<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
            'ar_name' => 'required|unique:articles,ar_name,'.$this->id,
            'ar_description' => 'required',
            'ar_content' => 'required',
        ];
    }

    public function  messages()
    {
        return[
            'ar_name.required' => 'Trường này không được để trống!',
            'ar_name.unique' => 'Tên bài viết không được trùng!',
            'ar_description.required' => 'Trường này không được để trống!',
            'ar_content.required' => 'Trường này không được để trống!',
        ];
    }
}
