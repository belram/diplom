<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicNameRequest extends FormRequest
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
            //
            'topic' => 'required|max:255|unique:topics'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно к заполнению',
            'max'=>'Поле :attribute должно быть не более 100 символов',
            'unique'=>'Поле :attribute должно быть уникальным'
        ];
    }
}
