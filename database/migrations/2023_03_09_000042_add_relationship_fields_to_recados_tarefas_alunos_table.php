<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRecadosTarefasAlunosTable extends Migration
{
    public function up()
    {
        Schema::table('recados_tarefas_alunos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_recado_tarefa_professor_id')->nullable();
            $table->foreign('id_recado_tarefa_professor_id', 'id_recado_tarefa_professor_fk_8086278')->references('id')->on('alunos');
            $table->unsignedBigInteger('id_professor_id')->nullable();
            $table->foreign('id_professor_id', 'id_professor_fk_8086279')->references('id')->on('alunos');
        });
    }
}
