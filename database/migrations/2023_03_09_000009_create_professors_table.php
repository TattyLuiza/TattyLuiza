<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status');
            $table->string('senha')->nullable();
            $table->string('cargo')->nullable();
            $table->string('banco')->nullable();
            $table->string('pis')->nullable();
            $table->string('ctps')->nullable();
            $table->date('admissao');
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('nome');
            $table->date('nascimento')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('sexo')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
