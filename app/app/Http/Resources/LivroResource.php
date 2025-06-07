<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'author' => new AutorResource($this->whenLoaded('autor')),
            'synopsis'=> $this->synopsis,
            'gender_id' => new GeneroResource($this->whenLoaded('genero')),
            'review' => ReviewResource::collection($this->whenLoaded('review')),
        ];
    }
}
