<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRecadoProfessoresTable extends Migration
{
    public function up()
    {
        Schema::table('recado_professores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_destinatario_id')->nullable();
            $table->foreign('id_destinatario_id', 'id_destinatario_fk_8086281')->references('id')->on('alunos');
        });
    }
}
