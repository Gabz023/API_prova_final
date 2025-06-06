<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'grade'=> $this->grade,
            'text'=> $this->text,
            'user_id'=> new UsuarioResource($this->whenLoaded('usuarios')),
            'book_id'=> new LivroResource($this->whenLoaded('livros')),
        ];
    }
}
