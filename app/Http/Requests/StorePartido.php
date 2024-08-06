<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartido extends FormRequest
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
            'nombre' => 'required|min:3',
            'torneo_id' => 'required',
            'fecha_partido' => 'required|date',
            'equipo_local_id' => 'required',
            'equipo_visitante_id' => 'required',
            'arbitro_id' => 'required'
        ];
    }
}
