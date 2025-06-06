<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grade'=>'sometimes|integer|min:0|max:5',
            'text'=>'sometimes|nullable|string|max:1000',
            'book_id'=>'sometimes|exists:livros,id',
            'user_id'=>'sometimes|exists:usuarios,id'
        ];
    }
}
