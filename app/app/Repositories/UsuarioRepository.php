<?php

namespace App\Repositories;
use App\Models\Usuario;

class UsuarioRepository
{
    public function get()
    {
        return Usuario::all();
    }

    public function store(array $data)
    {
        return Usuario::create($data);
    }

    public function details(int $id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $usuario = Usuario::find($id);
        $usuario->update($data);

        return $usuario;
    }

    public function delete(int $id)
    {
        $usuario = $this->details($id);
        $usuario->delete();

        return $usuario;
    }

    public function findReview(int $id)
    {
        $usuario = $this->details($id);
        $review = $usuario->review;
        return $review;
    }
}
