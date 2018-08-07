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
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title'       => 'required|min:3',
                        'body'        => 'required|min:6',
                        'category_id' => 'required|numeric',
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                return [];
        }
    }

    public function messages()
    {
        return [
            'title.min'            => '标题至少三个字符。',
            'body.min'             => '内容至少六个字符。',
            'body.required'        => '内容不能为空。',
            'category_id.required' => '请选择分类',
        ];
    }
}
