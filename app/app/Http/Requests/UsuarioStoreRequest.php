<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
        'name'  => 'required|string|max:255',
        'email' => 'required|string|email|max:50|unique:usuarios,email',
        'password' => 'required|string|min:8'
    ];
    }
}
