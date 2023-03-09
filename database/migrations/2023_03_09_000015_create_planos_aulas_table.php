<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanosAulasTable extends Migration
{
    public function up()
    {
        Schema::create('planos_aulas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bimestre')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->string('apostila')->nullable();
            $table->string('capitulo')->nullable();
            $table->longText('conteudo')->nullable();
            $table->longText('habilidades')->nullable();
            $table->longText('metodologia')->nullable();
            $table->longText('avaliacao')->nullable();
            $table->longText('link')->nullable();
            $table->longText('recurso')->nullable();
            $table->longText('atividade')->nullable();
            $table->longText('leitura')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
