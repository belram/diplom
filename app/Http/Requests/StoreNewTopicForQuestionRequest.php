<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewTopicForQuestionRequest extends FormRequest
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
            'topic' => 'required',
            'question_id' => 'required',
            'lastTopic' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно к заполнению'
        ];
    }
}
