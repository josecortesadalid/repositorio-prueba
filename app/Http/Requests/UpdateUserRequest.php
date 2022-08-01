<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'nombre' => 'required',
            'email' => 'required|unique:users,email'.$this->route('usuarios')
            // Lo que queremos es que si se introduce un email que ya está en uso por ese usuario, no salga que se ha actualizado, ya que no se debe actualizar nada que ya esté en uso
            // Para que no ocurra este error, necesitamos pasarle el id de ese registro. De esta manera si ya está en uso, no saldrá que se ha actualizado
            

            //.$this->route('usuarios')
            // al hacer un r:l vemos que el parámetro se llama 'usuarios'
            // si no se lo ponemos, nos puede salir un error. Nos dice que el email ya ha sido registrado
        ];
    }
}
