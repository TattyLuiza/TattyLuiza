<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasLetivosTable extends Migration
{
    public function up()
    {
        Schema::create('dias_letivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->timestamps();
        });
    }
}
