<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class TopicFormRequest extends FormRequest
{
    /**
     * 是否有权限
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
//            'title'       => 'required',
//            'category_id' => 'required',
//            'body'        => 'required'
        ];
    }

    public function messages()
    {
        return [];
    }
}
