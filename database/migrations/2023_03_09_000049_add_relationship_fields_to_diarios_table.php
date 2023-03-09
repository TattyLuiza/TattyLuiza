<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDiariosTable extends Migration
{
    public function up()
    {
        Schema::table('diarios', function (Blueprint $table) {
            $table->unsignedBigInteger('dia_letivo_id')->nullable();
            $table->foreign('dia_letivo_id', 'dia_letivo_fk_8143907')->references('id')->on('dias_letivos');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id', 'horario_fk_8143908')->references('id')->on('horarios');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143909')->references('id')->on('turmas');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143910')->references('id')->on('disciplinas');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id', 'professor_fk_8143911')->references('id')->on('professors');
        });
    }
}
