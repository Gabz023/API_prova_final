<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=> 'sometimes|string|max:100',
            'birth'=> 'sometimes|date',
            'bio'=> 'sometimes|string|max:1000'
        ];
    }
}
