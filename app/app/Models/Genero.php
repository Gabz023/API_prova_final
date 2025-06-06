<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';
    protected $fillable = ['name'];

    #Genero => vários livros
    public function livros()
    {
        return $this->hasMany(Livro::class, 'gender_id', 'id');
    }
}
