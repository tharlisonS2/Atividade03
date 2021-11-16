<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->string("nome",100);
            $table->date("dataNascimento");
            $table->foreignId("clube");
            $table->foreign("clube")->references("id")->on("clube");
            $table->foreignId("posicao");
            $table->foreign("posicao")->references("id")->on("posicao");
            $table->string("check",100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogador');
    }
}
