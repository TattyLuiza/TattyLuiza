<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinasTable extends Migration
{
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('abreviado')->nullable();
            $table->string('tipo')->nullable();
            $table->longText('ementa')->nullable();
            $table->string('livros')->nullable();
            $table->integer('ordem')->nullable();
            $table->integer('tipo_2')->nullable();
            $table->timestamps();
        });
    }
}
