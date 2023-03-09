<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoRecadoTarefasProfessorePivotTable extends Migration
{
    public function up()
    {
        Schema::create('aluno_recado_tarefas_professore', function (Blueprint $table) {
            $table->unsignedBigInteger('recado_tarefas_professore_id');
            $table->foreign('recado_tarefas_professore_id', 'recado_tarefas_professore_id_fk_8030766')->references('id')->on('recado_tarefas_professores')->onDelete('cascade');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id', 'aluno_id_fk_8030766')->references('id')->on('alunos')->onDelete('cascade');
        });
    }
}
