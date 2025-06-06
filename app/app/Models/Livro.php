<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    #protected $fillable = ['title', 'synopsis', 'author_id', 'gender_id', 'review_id'];
    protected $fillable = ['title', 'synopsis', 'author_id', 'gender_id'];

    #Livro => 1 autor
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'author_id', 'id');
    }

    #Livro => 1 genero
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'gender_id', 'id');
    }

    #Livro => várias reviews
    public function review()
    {
        return $this->hasMany(Review::class, 'book_id', 'id');
    }
}
