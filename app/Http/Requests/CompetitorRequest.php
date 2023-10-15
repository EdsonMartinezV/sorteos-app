<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetitorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'name' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'phone' => ['required', 'string', 'numeric', 'size:10'],
            'ticket_number' => ['required', 'integer', 'max:25'],
            'lottery_id' => ['required', 'exists:competitors,id']
        ];
    }

    public function messages(): array{
        return [
            'name' => 'Escribe tu nombre',
            'lastname' => 'Escribe tu apellido',
            'phone' => 'Necesitamos un número de telefono',
            'ticket_number' => 'Buen intento',
            'lottery_id' => 'Buen intento'
        ];
    }
}
