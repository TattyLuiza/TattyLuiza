<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    public function up()
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario')->nullable();
            $table->string('url')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }
}
