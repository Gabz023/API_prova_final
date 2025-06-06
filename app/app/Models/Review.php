<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['grade', 'text', 'book_id', 'user_id'];

    #Review => 1 livro
    public function livros()
    {
        return $this->belongsTo(Livro::class, 'book_id', 'id');
    }

    #Review => 1 usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id', 'id');
    }
}
