<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'persona_id' => 'required|exists:personas,id',
            'rol_id' => 'required|exists:roles,id',
            'nombre_usuario' => 'required|string|unique:usuarios,nombre_usuario|max:255',
            'contrasena' => 'required|string|min:6',
            'estado' => 'required|in:0,1',
        ];
    }
}
