<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['name', 'email', 'password'];

    #Usuário => várias reviews
    public function review()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }
}
