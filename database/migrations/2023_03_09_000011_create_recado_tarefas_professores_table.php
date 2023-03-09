<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecadoTarefasProfessoresTable extends Migration
{
    public function up()
    {
        Schema::create('recado_tarefas_professores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->longText('turmas')->nullable();
            $table->longText('alunos')->nullable();
            $table->string('titulo');
            $table->longText('texto')->nullable();
            $table->longText('arquivos')->nullable();
            $table->date('agendamento_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
