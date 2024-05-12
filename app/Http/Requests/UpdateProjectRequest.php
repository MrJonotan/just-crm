<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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

    public function prepareForValidation()
    {
        if($this->input('budget_fact') == '-'){
            $budget_fact = $this->input('budget_fact');
            $budget_fact = null;
            $this->merge(['budget_fact' => $budget_fact]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'   			=> 'required',
            'status_id'    		=> '',
            'priority_id'    	=> '',
            'manager_id'   		=> '',
            'specific'    		=> 'max:1000',
            'measurable'   		=> 'max:1000',
            'achievable'   		=> 'max:1000',
            'relevant'    		=> 'max:1000',
            'time_bound'   		=> 'max:1000',
            'color'    			=> 'required',
            'start_date_plan'   => '',
            'start_date_fact'   => '',
            'end_date_plan'    	=> '',
            'end_date_fact'    	=> '',
            'budget_plan'    	=> 'max:12',
            'budget_fact'   	=> 'max:12',
            'hours'    			=> '',
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
