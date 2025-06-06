<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use Illuminate\Http\JsonResponse;
use App\Services\ServiceLivro;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\AutorResource;
use App\Http\Resources\GeneroResource;



class ControllerLivro extends Controller
{
    private ServiceLivro $livroService;

    public function __construct(ServiceLivro $livroService)
    {
         $this->livroService = $livroService;
    }

     public function get()
     {
        $livros = $this->livroService->get();

        return LivroResource::collection($livros);
    }

    public function details(int $id)
    {
        try
        {
            $livro = $this->livroService->details($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Livro não existe'],404);
        }

        return new LivroResource($livro);
    }

    public function store(LivroStoreRequest $request)
    {
        $data = $request->validated();
        $livro = $this->livroService->store($data);

        return new LivroResource($livro);
    }

    public function update(int $id, LivroUpdateRequest $request)
    {
        $data = $request->validated();
        try
        {
            $livro = $this->livroService->update($id,$data);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Livro não existe'],404);
        }

        return new LivroResource($livro);
    }

    public function delete(int $id)
    {
        try
        {
            $livro = $this->livroService->delete($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Livro não existe'],404);
        }

        return new LivroResource($livro);
    }

    public function getComAutores()
    {
        $livro = $this->livroService->getComAutores();

        return LivroResource::collection($livro);
    }

    public function findAutor(int $id)
    {
        try
        {
            $autor = $this->livroService->findAutor($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Autor não existe'],404);
        }

        return new AutorResource($autor);
    }

    public function getComGeneros()
    {
        $livro = $this->livroService->getComGeneros();

        return BookResource::collection($livro);
    }

    public function findGenero(int $id)
    {
        try
        {
            $genero = $this->livroService->findGenero($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Gênero não existe'],404);
        }

        return new GeneroResource($genero);
    }

    public function findReview(int $id)
    {
        try
        {
            $review = $this->livroService->findReview($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Review não  existe'],404);
        }

        if ($review->isEmpty()) 
        {
            return response()->json(['message' => 'Nenhuma review encontrada'], 204);
        }

        return ReviewResource::collection($review);
    }


    public function getComGeneroAutorReview()
    {
        $livro = $this->livroService->getComGeneroAutorReview();
        
        return LivroResource::collection($livro);
    }
}
