<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoRecadosTarefasAlunoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('aluno_recados_tarefas_aluno', function (Blueprint $table) {
            $table->unsignedBigInteger('recados_tarefas_aluno_id');
            $table->foreign('recados_tarefas_aluno_id', 'recados_tarefas_aluno_id_fk_8030844')->references('id')->on('recados_tarefas_alunos')->onDelete('cascade');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id', 'aluno_id_fk_8030844')->references('id')->on('alunos')->onDelete('cascade');
        });
    }
}
