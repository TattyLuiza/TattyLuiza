<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriessTable extends Migration
{
    public function up()
    {
        Schema::create('seriess', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('nome');
            $table->string('turno')->nullable();
            $table->decimal('valor', 15, 2)->nullable();
            $table->string('sala')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
        });
    }
}
