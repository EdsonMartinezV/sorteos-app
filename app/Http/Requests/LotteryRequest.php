<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LotteryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'prize' => ['required', 'string'],
            'is_active' => ['required', 'boolean']
        ];
    }

    public function messages(): array{
        return [
            'prize' => 'El nombre del premio brother',
            'is_active' => 'El sorteo será visible ahora?'
        ];
    }
}
