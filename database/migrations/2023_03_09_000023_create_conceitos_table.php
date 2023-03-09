<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceitosTable extends Migration
{
    public function up()
    {
        Schema::create('conceitos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('tipo')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
        });
    }
}
