<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title'          => 'required|min:3|max:200',
            'slug'           => 'max:200',
            'excerpt'        => 'max:500',
            'content_raw'    => 'required|string|min:5|max:10000',
            'category_id'    => 'required|integer|exists:blog_categories,id',
            'photo_upload.*' => 'mimetypes:image/jpeg,image/jpg,image/png|max:5120|dimensions:max_width=4096,max_height=4096',
        ];
    }

    /**
     * Переводы сообщений
     *
     * Get the error messages for the define validation rules
     *
     * @return array
     */
    public function messages()
    {
        // resource\lang\validation
        return [
            'title.required'  => 'Введите заголовок статьи',
            'content_raw.min' => 'Минимальная длинна статьи :min символов',
            'content_raw.max' => 'Минимальная длинна статьи :max символов',
            'photo_upload.*.max'  => 'Максимальный объем загружаемого файла не должен превышать :max Кбайт',
        ];
    }
}
