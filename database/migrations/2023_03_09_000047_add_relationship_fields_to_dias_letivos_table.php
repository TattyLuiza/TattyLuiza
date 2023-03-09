<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDiasLetivosTable extends Migration
{
    public function up()
    {
        Schema::table('dias_letivos', function (Blueprint $table) {
            $table->unsignedBigInteger('ano_id')->nullable();
            $table->foreign('ano_id', 'ano_fk_8143723')->references('id')->on('anos');
        });
    }
}
