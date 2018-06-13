<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewAdminRequest extends FormRequest
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
            'name' => 'required|max:255',
            'login' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно к заполнению',
            'email'=>'Поле :attribute должно соответствовать email адресу',
            'max'=>'Значение поля :attribute должно быть меннее 255 символов',
            'min'=>'Значение поля :attribute должно быть более 5 символов'
        ];
    }
}
