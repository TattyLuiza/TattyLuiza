<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHorariosTable extends Migration
{
    public function up()
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->unsignedBigInteger('ano_id')->nullable();
            $table->foreign('ano_id', 'ano_fk_8149363')->references('id')->on('anos');
        });
    }
}
