<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->string('diretor');
            $table->string('genero');
            $table->integer('ano');
            $table->string('classificacao');
            $table->foreignId('user_id');
        });
    }

    /*
Título (string)
- Diretor (string)
- Gênero (string)
- Ano de lançamento (integer)
- Classificação indicativa (select: Livre, 10 anos, 12 anos, 14 anos, 16 anos, 18 anos)

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmes');
    }
};
