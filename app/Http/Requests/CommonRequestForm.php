<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() : array
    {
        return [
            'common_field' => 'required|string|max:255',
        ];
    }

    public function messages() : array
    {
        return [
            'common_field.required' => 'Поле обязательно для заполнения.',
            'common_field.max' => 'Поле не должно превышать 255 символов.',
            // Добавьте другие сообщения об ошибках для общих правил
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            // Дополнительные действия при ошибке валидации
            // Например, можно выполнить перенаправление или что-то еще
        }
    }

}
