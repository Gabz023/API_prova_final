<?php

namespace App\Services;

use App\Model\Usuario;
use App\Repositories\RepositoryUsuario;

class ServiceUsuario
{
    private RepositoryUsuario $usuarioRepository;

    public function __construct(RepositoryUsuario $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function get()
    {
        $usuario = $this->usuarioRepository->get();

        return $usuario;
    }

    public function store(array $data)
    {
        $usuario = $this->usuarioRepository->store($data);

        return $usuario;
    }

    public function details(int $id)
    {
        $usuario = $this->usuarioRepository->details($id);

        return $usuario;
    }

    public function update(int $id, array $data)
    {
        $usuario = $this->usuarioRepository->update($id, $data);

        return $usuario;
    }

    public function delete(int $id)
    {
        $usuario = $this->usuarioRepository->delete($id);

        return $usuario;
    }

    public function findReview(int $id)
    {
        $review = $this->usuarioRepository->findReview($id);
        return $review;
    }
}
