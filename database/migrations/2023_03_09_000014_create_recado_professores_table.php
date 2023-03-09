<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecadoProfessoresTable extends Migration
{
    public function up()
    {
        Schema::create('recado_professores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->longText('texto')->nullable();
            $table->integer('leu')->nullable();
            $table->date('lida_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
