<?php

namespace App\Services;

use App\Repositories\AutorRepository;
use App\Models\Autor;

class AutorService
{
    private AutorRepository $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

    public function get()
    {
        $autor = $this->autorRepository->get();
        
        return $autor;
    }

    public function store(array $data)
    {
        $autor = $this->autorRepository->store($data);
        
        return $autor;
    }

    public function datails(int $id)
    {
        $autor = $this->autorRepository->details($id);
        
        return $autor;
    }

    public function update(int $id, array $data)
    {
        $autor = $this->autorRepository->update($id, $data);
        
        return $autor;
    }

    public function delete(int $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return $autor;
    }

    public function getComLivros()
    {
        return $this->autorRepository->getComLivros();
    }

    public function findLivro(int $id)
    {
        return $this->autorRepository->findLivro($id);
    }    
}
