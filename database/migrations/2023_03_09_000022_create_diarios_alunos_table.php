<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiariosAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('diarios_alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('presenca')->nullable();
            $table->longText('atestado')->nullable();
            $table->longText('obs')->nullable();
            $table->integer('status');
            $table->longText('arquivo')->nullable();
            $table->timestamps();
        });
    }
}
