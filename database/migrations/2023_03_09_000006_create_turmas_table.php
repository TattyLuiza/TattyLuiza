<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('nome')->nullable();
            $table->string('sala')->nullable();
            $table->string('turno')->nullable();
            $table->decimal('valor', 15, 2)->nullable();
            $table->longText('obs')->nullable();
            $table->integer('letivos');
            $table->integer('carga_horaria');
            $table->string('falta')->nullable();
            $table->timestamps();
        });
    }
}
