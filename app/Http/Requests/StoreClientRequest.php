<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name'    => 'min:3',
            'name'          => 'require|min:2',
            'last_name'     => 'min:5',
            'organization'  => 'require',
            'email'         => '',
            'phone'         => 'require',
            'photo'         => 'file|memes:png,jpg,jpeg',
            'status_id'     => 'require',
            'order'         => 'require|min:7',
            'category'      => 'require'
        ];
    }

    public function messages() : array
    {
        return [
            'first_name.min' => 'Поле "Фамилия" должна содержать минимум 3 символа',
            'name.require' => 'Поле "Имя" обязательно для заполнения',
            'name.min' => 'Поле "Имя" должно содержать минимум 2 символа',
            'last_name.min' => 'Поле "Отчество" должно содержать минимум 5 символов',
            'organization.require' => 'Поле "Организация" обязательно для заполнения',
            'phone' => 'Поле "Телефон" обязательно для заполнения',
        ];
    }
}
