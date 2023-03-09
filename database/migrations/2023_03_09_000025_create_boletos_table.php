<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('movimento')->nullable();
            $table->string('descricao')->nullable();
            $table->string('parcela')->nullable();
            $table->decimal('valor', 15, 2);
            $table->decimal('recebido', 15, 2);
            $table->date('datadesconto')->nullable();
            $table->decimal('valordesconto', 15, 2);
            $table->string('instrucoes')->nullable();
            $table->string('status')->nullable();
            $table->integer('tipo')->nullable();
            $table->string('mora')->nullable();
            $table->string('multa')->nullable();
            $table->date('vencimento');
            $table->date('data');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
