<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifyPersonaRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:255', 'min:2'],
            'calle' => ['required', 'string', 'max:255', 'min:2'],
            'numero' => ['required', 'integer', 'min:1'],
            'colonia' => ['required', 'string', 'max:255', 'min:2'],
            'cp' => ['required', 'digits:5']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre' => 'Proporciona un Nombre válido',
            'calle' => 'Proporciona una Calle válida',
            'numero' => 'Proporciona un Número válido',
            'colonia' => 'Proporciona una Colonia válida',
            'cp' => 'Proporciona un Código postal válido'
        ];
    }
}
