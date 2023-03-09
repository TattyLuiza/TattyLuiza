<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTurmaprofessordisciplinasTable extends Migration
{
    public function up()
    {
        Schema::table('turmaprofessordisciplinas', function (Blueprint $table) {
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8143921')->references('id')->on('turmas');
            $table->unsignedBigInteger('professor_id')->nullable();
            $table->foreign('professor_id', 'professor_fk_8143922')->references('id')->on('professors');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143923')->references('id')->on('disciplinas');
        });
    }
}
