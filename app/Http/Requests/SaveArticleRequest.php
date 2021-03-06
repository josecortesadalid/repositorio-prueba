<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveArticleRequest extends FormRequest
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
            'titular' => 'required',
            'entradilla' => 'required',
            'cuerpo' => 'required',
            'imagen' => [
                'required',
                Rule::unique('articulos')->ignore( $this->route('cms')),
                'dimensions:min_width=320,min_height=100'
            ],
            'titular_url' => ['required', 'unique:articulos']

        ];
    }
}
