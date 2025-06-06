<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AutorController::class)->group(function () {
    Route::get('/autor', 'get');
    Route::get('/autor/livros', 'getComLivros');
    Route::get('/autor/livros/{id}', 'findLivro');
    Route::get('/autor/{id}', 'details');
    Route::post('/autor', 'store');
    Route::patch('/autor/{id}', 'update');
    Route::delete('/autor/{id}', 'delete');
});

Route::controller(GeneroController::class)->group(function () {
    Route::get('/generos', 'get');
    Route::get('/generos/livros', 'getComLivros');
    Route::get('/generos/{id}', 'details');
    Route::post('/generos', 'store');
    Route::patch('/generos/{id}', 'update');
    Route::delete('/generos/{id}', 'delete');
    Route::get('/generos/livros/{id}', 'findLivro');
});

Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'get');
    Route::get('/livros/generos/autores/reviews','getComGeneroAutorReview');
    Route::get('/livros/autor', 'getComAutores');
    Route::get('/livros/generos', 'getComGeneros');
    Route::get('/livros/autor/{id}', 'findAutor');
    Route::get('/livros/generos/{id)', 'findGenero');
    Route::get('/livros/reviews/{id}', 'findReview');
    Route::get('/livros/{id}', 'details');
    Route::post('/livros', 'store');
    Route::patch('/livros/{id}', 'update');
    Route::delete('/livros/{id}', 'delete');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::patch('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');
});

Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios', 'get');
    Route::get('/usuarios/{id}', 'details');
    Route::get('/usuarios/reviews/{id}', 'findReview');
    Route::post('/usuarios', 'store');
    Route::patch('/usuarios/{id}', 'update');
    Route::delete('/usuarios/{id}', 'delete');

});
