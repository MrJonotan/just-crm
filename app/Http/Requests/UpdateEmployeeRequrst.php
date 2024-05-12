<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequrst extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'            => 'required|string|min:2',
            'name'                  => 'required|string|min:2',
            'last_name'             => 'required|string|min:2',
            'email'                 => 'required',
            'date_of_employment'    => 'required|date',
            'birthday'              => 'required|date',
            'position_id'           => 'required',
            'job_status_id'         => 'required',
            'stake'                 => 'required',
            'phone'                 => 'required|unique:users',
            'department_id'         => 'required',
            //'photo'                 => 'unique:users|file|memes:png,jpg,jpeg'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле "Фамилия" обязательно для заполнения!',
            'first_name.string' => 'Поле "Фамилия" должно быть строкой!',
            'first_name.min' => 'Поле "Фамилия" должно содержать не менее 2 символов!',
            'name.required' => 'Поле Имя обязательно для заполнения!',
            'name.string' => 'Поле Имя должно быть строкой!',
            'name.min' => 'Поле Имя должно содержать не менее 2 символов!',
            'last_name.required' => 'Поле Отчевство обязательно для заполнения!',
            'last_name.string' => 'Поле Отчевство должно быть строкой!',
            'last_name.min' => 'Поле Отчевство должно содержать не менее 2 символов!',
            'email.required' => 'Поле Почта обязательно для заполнения!',
            'password.required' => 'Поле Пароль обязательно для заполнения!',
            'password.min' => 'Поле Пароль должно содержать не менее 12 символов!',
            'date_of_employment.required' => 'Поле Дата трудоустройства обязательно для заполнения!',
            'date_of_employment.date' => 'Поле Дата трудоустройства должна быть датой!',
            'birthday.required' => 'Поле Дата рождения обязательно для заполнения!',
            'birthday.date' => 'Поле Дата рождения должна быть датой!',
            'position_id.required' => 'Поле Должность обязательно для заполнения!',
            'job_status_id.required' => 'Поле Статус обязательно для заполнения!',
            'stake.required' => 'Поле Ставка обязательно для заполнения!',
            'phone.required' => 'Поле Телефон обязательно для заполнения!',
            'department_id.required' => 'Поле Отдел обязательно для заполнения!',
        ];
    }
}
