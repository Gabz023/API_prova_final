<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
            'synopsis'=>'required|string|max:1000',
            'author_id'=>'required|integer|exists:autores,id',
            'gender_id'=>'required|integer|exists:generos,id'
        ];
    }
}
