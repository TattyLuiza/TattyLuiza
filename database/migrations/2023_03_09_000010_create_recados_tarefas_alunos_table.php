<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecadosTarefasAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('recados_tarefas_alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->longText('texto')->nullable();
            $table->longText('arquivo')->nullable();
            $table->string('tipo');
            $table->string('modo');
            $table->integer('leu');
            $table->date('agendamento')->nullable();
            $table->date('lida_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
