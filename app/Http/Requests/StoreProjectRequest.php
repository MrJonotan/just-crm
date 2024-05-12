<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
    public function rules() : array
    {
        return [
            'title'   			=> 'required',
            'status_id'    		=> 'required',
            'priority_id'    	=> 'required',
            'manager_id'   		=> 'required',
            'client_id'    		=> 'required',
            'color'    			=> 'required',
            'start_date_plan'   => '',
            'start_date_fact'   => '',
            'end_date_plan'    	=> '',
            'end_date_fact'    	=> '',
            'specific'    		=> 'max:1000',
            'measurable'   		=> 'max:1000',
            'achievable'   		=> 'max:1000',
            'relevant'    		=> 'max:1000',
            'time_bound'   		=> 'max:1000',
            'budget_plan'    	=> 'max:12',
            'budget_fact'   	=> 'max:12',
            'hours'    			=> 'required',
            'readiness'    		=> '',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения!',
            'status_id.required' => 'Поле "Статус" обязательно для заполнения!',
            'priority_id.required' => 'Поле "Приоритет" обязательно для заполнения!',
            'manager_id.required' => 'Поле "Менеджер" обязательно для заполнения!',
            'client_id.required' => 'Поле "Клиент" обязательно для заполнения!',
            'color.required' => 'Поле "Цвет" обязательно для заполнения!',
            'hours.required' => 'Поле "Часы" обязательно для заполнения!',
            'budget_plan.max' => 'Поле "Бюджет план" имеет максимальное значение 12 символов!',
            'budget_fact.max' => 'Поле "Бюджет факт" имеет максимальное значение 12 символов!',
        ];
    }
}
