<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHorarioSemanalsTable extends Migration
{
    public function up()
    {
        Schema::table('horario_semanals', function (Blueprint $table) {
            $table->unsignedBigInteger('ano_id')->nullable();
            $table->foreign('ano_id', 'ano_fk_8143787')->references('id')->on('anos');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143788')->references('id')->on('turmas');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id', 'professor_fk_8143790')->references('id')->on('professors');
            $table->unsignedBigInteger('horario_id')->nullable();
            $table->foreign('horario_id', 'horario_fk_8143791')->references('id')->on('horarios');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143828')->references('id')->on('disciplinas');
        });
    }
}
