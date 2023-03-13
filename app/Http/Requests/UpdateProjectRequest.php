<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('projects')->ignore($this->project), 'max:150'],
            'content' => ['nullable'],
            'date_project' => ['nullable', 'date_format:Y-m-d'],
            'type_id' => ['nullable', 'exists:types,id'],
            'techs' => ['exists:technologies,id'],
            'cover_image' => ['nullable', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Il project con questo titolo è già presente nella pagina',
            'title.max' => 'Il titolo può essere lungo al massimo :max caratteri.',
            'date_project.date_format' => 'La data inserita non è nel formato corretto',
            'cover_image.image' => 'Inserire un formato di immagine valido',
        ];
    }
}
