<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'project_id'    => 'required|int',
            'title'         => 'required|char|min:5|max:255',
            'file_path'     => 'required|file|mimes:doc,docx,xls,xlsx,png,pdf,jpg|max:2048',
        ];
    }
}
