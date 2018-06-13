<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionAutorWithoutAnswerRequest extends FormRequest
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
            'question' => 'required',
            'author_question' => 'required|max:150'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно к заполнению',
            'max'=>'Значение поля :attribute должно быть меннее 150 символов'
        ];
    }

    
}
