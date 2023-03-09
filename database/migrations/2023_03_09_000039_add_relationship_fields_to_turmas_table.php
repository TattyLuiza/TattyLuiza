<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTurmasTable extends Migration
{
    public function up()
    {
        Schema::table('turmas', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id')->nullable();
            $table->foreign('serie_id', 'serie_fk_8143718')->references('id')->on('seriess');
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->foreign('banco_id', 'banco_fk_8143794')->references('id')->on('bancos');
            $table->unsignedBigInteger('ano_id')->nullable();
            $table->foreign('ano_id', 'ano_fk_8147683')->references('id')->on('anos');
        });
    }
}
