<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSeriedisciplinasTable extends Migration
{
    public function up()
    {
        Schema::table('seriedisciplinas', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id')->nullable();
            $table->foreign('serie_id', 'serie_fk_8143841')->references('id')->on('seriess');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id', 'disciplina_fk_8143842')->references('id')->on('disciplinas');
        });
    }
}
