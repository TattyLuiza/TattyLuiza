<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsEnviadosTable extends Migration
{
    public function up()
    {
        Schema::create('emails_enviados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->integer('clicou');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
