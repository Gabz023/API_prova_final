<?php

namespace App\Services;

use App\Model\Livro;
use App\Repositories\RepositoryLivro;
use App\Http\Resources\LivroResource;


class ServiceLivro
{

    private RepositoryLivro $livroRepository;

    public function __construct(RepositoryLivro $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function get()
    {
        $livros = $this->livroRepository->get();

        return $livros;
    }

    public function store(array $data)
    {
        $livro = $this->livroRepository->store($data);

        return $livro;
    }

    public function details(int $id)
    {
        $livro = $this->livroRepository->details($id);

        return $livro;
    }

    public function update(int $id, array $data)
    {
         $livro = $this->livroRepository->update($id, $data);

        return $livro;
    }

    public function delete(int $id)
    {
        $livro = $this->livroRepository->delete($id);

        return $livro;
    }

    public function getComAutor()
    {
        return $this->livroRepository->getComAutor();
    }

    public function findAutor(int $id)
    {
        return $this->livroRepository->findAutor($id);
    }

    public function getComGeneros()
    {
        return $this->livroRepository->getComGeneros();
    }

    public function findGenero(int $id)
    {
        return $this->livroRepository->findGeneros($id);
    }

      public function findReview(int $id)
    {
        return $this->livroRepository->findReview($id);
    }

    public function getComAutorGeneroReview()
    {
        return $this->livroRepository->getComAutorGeneroReview();
    }

}

