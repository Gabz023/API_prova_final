<?php

namespace App\Services;

use App\Repositories\GeneroRepository;
use App\Models\Genero;

class GeneroService
{
    private GeneroRepository $generoRepository;

    public function __construct(GeneroRepository $generoRepository)
    {
        $this->generoRepository = $generoRepository;
    }

    public function get()
    {
        $genero = $this->generoRepository->get();

        return $genero;
    }

    public function store(array $data)
    {
        $genero = $this->generoRepository->store($data);

        return $genero;
    }

    public function details(int $id)
    {
        $genero = $this->generoRepository->details($id);

        return $genero;
    }

    public function update(int $id, array $data)
    {
        $genero = $this->generoRepository->update($id, $data);

        return $genero;
    }

    public function delete(int $id)
    {
        $genero = Genero::findOrFail($id);
        foreach ($genero->livros as $livro) 
        {
            $livro->genero_id = null;
            $livro->save();
        }

        $genero->delete();

        return $genero;
    }

    public function getComLivros()
    {
        return $this->generoRepository->getComLivros();
    }

    public function findLivro(int $id)
    {
        return $this->generoRepository->findLivro($id);
    }
}
