<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; 
        // $this->user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'titular_url' => [
                'required', 
                Rule::unique('projects')->ignore( $this->route('project'))
            ],
            'tecnologias' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Este proyecto necesita un nombre', 
            'descripcion.required' => 'Este proyecto necesita una descripción', 
            'titular_url.required' => 'Este proyecto necesita un titular URL',
            'tecnologias.required' => 'Este proyecto necesita unas tecnologías'
        ];
    }

}
