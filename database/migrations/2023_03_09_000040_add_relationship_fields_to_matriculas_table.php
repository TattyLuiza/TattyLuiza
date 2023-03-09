<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatriculasTable extends Migration
{
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->unsignedBigInteger('ano_id')->nullable();
            $table->foreign('ano_id', 'ano_fk_8143678')->references('id')->on('anos');
            $table->unsignedBigInteger('aluno_id')->nullable();
            $table->foreign('aluno_id', 'aluno_fk_8143675')->references('id')->on('alunos');
            $table->unsignedBigInteger('mae_id')->nullable();
            $table->foreign('mae_id', 'mae_fk_8143676')->references('id')->on('responsaveis');
            $table->unsignedBigInteger('pai_id')->nullable();
            $table->foreign('pai_id', 'pai_fk_8143677')->references('id')->on('responsaveis');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143699')->references('id')->on('turmas');
        });
    }
}
