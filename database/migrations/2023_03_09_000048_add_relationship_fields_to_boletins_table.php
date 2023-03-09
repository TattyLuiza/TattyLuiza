<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBoletinsTable extends Migration
{
    public function up()
    {
        Schema::table('boletins', function (Blueprint $table) {
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->foreign('aluno_id', 'aluno_fk_8143746')->references('id')->on('alunos');
            $table->unsignedBigInteger('matricula_id')->nullable();
            $table->foreign('matricula_id', 'matricula_fk_8143748')->references('id')->on('matriculas');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id', 'professor_fk_8143749')->references('id')->on('professors');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143750')->references('id')->on('turmas');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143852')->references('id')->on('disciplinas');
        });
    }
}
