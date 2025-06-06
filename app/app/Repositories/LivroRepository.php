<?php

namespace App\Repositories;
use App\Models\Livro;

class LivroRepository
{
    public function get()
    {
        return Livro::all();
    }

    public function store(array $data)
    {
        return Livro::create($data);
    }

    public function details(int $id)
    {
        return Livro::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $livro = Livro::find($id);
        $livro->update($data);

        return $livro;
    }

    public function delete(int $id)
    {
        $livro = $this->details($id);
        $livro->delete();

        return $livro;
    }

    public function getComAutor()
    {
        $livro = Livro::with('autor')->get();
        return $livro;
    }

    public function findAutor(int $id)
    {
        $livro = $this->details($id);
        $autor = $livro->autor;
        return $autor;
    }

    public function getComGeneros()
    {
        $livro = Livro::with('genero')->get();
        return $livro;
    }

    public function findGeneros(int $id)
    {
        $livro = $this->details($id);
        $genero = $livro->genero;
        return $genero;
    }

    public function findReview(int $id)
    {
        $livro = $this->details($id);
        $review = $livro->review;
        return $review;
    }

    public function getComAutorGeneroReview()
    {
        return Livro::with(['autor', 'genero', 'review'])->get();
    }
}
