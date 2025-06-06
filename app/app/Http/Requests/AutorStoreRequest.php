<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:100',
            'birth'=> 'required|date',
            'bio'=> 'required|string|max:1000'
        ];
    }
}
