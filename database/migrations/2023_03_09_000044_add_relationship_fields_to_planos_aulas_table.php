<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPlanosAulasTable extends Migration
{
    public function up()
    {
        Schema::table('planos_aulas', function (Blueprint $table) {
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id', 'horario_fk_8143751')->references('id')->on('horarios');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143832')->references('id')->on('disciplinas');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143753')->references('id')->on('turmas');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id', 'professor_fk_8143754')->references('id')->on('professors');
            $table->unsignedBigInteger('dia_letivo_id')->nullable();
            $table->foreign('dia_letivo_id', 'dia_letivo_fk_8143755')->references('id')->on('dias_letivos');
        });
    }
}
