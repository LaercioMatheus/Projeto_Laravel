<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            // Aqui vai ser onde fica tudo que eu quero validar do usuário
            // Posso fazer dessa forma no NAME:
            // Ou da forma do EMAIL:
            'name' => 'required|string|min:3|max:100',
            'email' => [
                'required',
                'email',
                //'unique:users,email',
                // Posso deixar o usuário alterar apenas as informações necessárias
                Rule::unique('users', 'email')->ignore($this->user, 'id'),
                'min:3',
                'max:100'
            ],
            'password' => [
                'required',
                'min:6',
                'max:20',
            ]
            
        ];
    }
}
