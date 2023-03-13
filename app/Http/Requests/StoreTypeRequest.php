<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
            'name' => ['required', 'unique:types', 'max:50'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il titolo è obbligatorio',
            'name.unique' => 'Questo tipo è già presente nella pagina',
            'name.max' => 'Il nome non può essere più lungo di :max caratteri.',
            'name.unique' => 'Questo tipo è già presente nella pagina',
        ];
    }
}
