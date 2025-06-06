<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>'sometimes|string|max:255',
            'synopsis'=>'sometimes|string|max:1000',
            'author_id'=>'sometimes|integer|exists:autores,id',
            'gender_id'=>'sometimes|integer|exists:generos,id'
        ];
    }
}
