<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceAutor;
use App\Http\Resources\AutorResource;
use App\Http\Requests\AutorStoreRequest;
use App\Http\Requests\AutorUpdateRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\LivroResource;


class ControllerAutor extends Controller
{
    private ServiceAutor $autorService;

    public function __construct(ServiceAutor $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get()
    {
        $autor = $this->autorService->get();

        return AutorResource::collection($autor);
    }

    public function store(AutorStoreRequest $request)
    {
        $data = $request->validated();
        $autor = $this->autorService->store($data);

        return new AutorResource($autor);
    }

    public function details(int $id)
    {
        try
        {
            $autor = $this->autorService->details($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Autor não existe'],404);
        }
        return new AutorResource($autor);
    }


    public function update(int $id, AutorUpdateRequest $request)
    {
        $data = $request->validated();
        try
        {
            $autor = $this->autorService->update($id,$data);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Autor não existe'],404);
        }

        return new AutorResource($autor);
    }

    public function delete(int $id)
    {
        try
        {
            $autor = $this->autorService->delete($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Autor não existe'],404);
        }
        return new AutorResource($autor);
    }

    public function getComLivros()
    {
        $autor = $this->autorService->getComLivros();
        return AutorResource::collection($autor);
    }

    public function findLivro(int $id)
    {
        try
        {
            $livros = $this->autorService->findLivro($id);
        }
        catch(ModelNotFoundException $e)
        {
            return response()->json(['error'=>'Autor não existe'],404);
        }
        return LivroResource::collection($livros);
    }

}
