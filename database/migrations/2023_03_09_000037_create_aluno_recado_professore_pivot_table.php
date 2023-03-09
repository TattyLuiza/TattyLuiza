<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoRecadoProfessorePivotTable extends Migration
{
    public function up()
    {
        Schema::create('aluno_recado_professore', function (Blueprint $table) {
            $table->unsignedBigInteger('recado_professore_id');
            $table->foreign('recado_professore_id', 'recado_professore_id_fk_8031179')->references('id')->on('recado_professores')->onDelete('cascade');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id', 'aluno_id_fk_8031179')->references('id')->on('alunos')->onDelete('cascade');
        });
    }
}
