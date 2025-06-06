<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['name', 'birth', 'bio'];

    #Autor => vários livros
    public function livros()
    {
        return $this->hasMany(Livro::class, 'author_id', 'id');
    }
}
