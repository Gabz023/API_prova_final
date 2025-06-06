<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'grade'=>'required|integer|min:0|max:5',
            'text'=>'nullable|string|max:1000',
            'book_id'=>'required|exists:livros,id',
            'user_id'=>'required|exists:usuarios,id'
        ];
    }
}
