<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDiariosAlunosTable extends Migration
{
    public function up()
    {
        Schema::table('diarios_alunos', function (Blueprint $table) {
            $table->unsignedBigInteger('diario_id')->nullable();
            $table->foreign('diario_id', 'diario_fk_8086550')->references('id')->on('diarios');
            $table->unsignedBigInteger('matricula_id')->nullable();
            $table->foreign('matricula_id', 'matricula_fk_8086551')->references('id')->on('matriculas');
        });
    }
}
