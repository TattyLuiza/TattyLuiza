<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRemessasTable extends Migration
{
    public function up()
    {
        Schema::table('remessas', function (Blueprint $table) {
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->foreign('banco_id', 'banco_fk_8143793')->references('id')->on('bancos');
        });
    }
}
