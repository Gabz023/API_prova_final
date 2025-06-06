<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) 
        {
            $table->engine = 'InnoDB'; #Engine para melhor segurança do banco
            $table->id();
            $table->unsignedTinyInteger('grade');
            $table->text('text')->nullable();
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('livros')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
