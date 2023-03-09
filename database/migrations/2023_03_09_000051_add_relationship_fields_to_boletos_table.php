<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBoletosTable extends Migration
{
    public function up()
    {
        Schema::table('boletos', function (Blueprint $table) {
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->foreign('banco_id', 'banco_fk_8143792')->references('id')->on('bancos');
            $table->unsignedBigInteger('matricula_id')->nullable();
            $table->foreign('matricula_id', 'matricula_fk_8155565')->references('id')->on('matriculas');
            $table->unsignedBigInteger('turma_id')->nullable();
            $table->foreign('turma_id', 'turma_fk_8155566')->references('id')->on('turmas');
        });
    }
}
