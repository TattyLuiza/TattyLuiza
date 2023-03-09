<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsaveisTable extends Migration
{
    public function up()
    {
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('rg');
            $table->string('cpf');
            $table->date('nascimento')->nullable();
            $table->string('rua')->nullable();
            $table->string('complemento')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('instrucao')->nullable();
            $table->string('profissao')->nullable();
            $table->string('trabalho')->nullable();
            $table->string('fonetrabalho')->nullable();
            $table->string('sexo')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
        });
    }
}
