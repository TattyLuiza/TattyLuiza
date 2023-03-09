<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('nome');
            $table->string('sexo')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('telefone')->nullable();
            $table->datetime('acesso')->nullable();
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('categoria')->nullable();
            $table->string('frequentar')->nullable();
            $table->string('busca')->nullable();
            $table->string('busca_1')->nullable();
            $table->string('busca_2')->nullable();
            $table->string('busca_3')->nullable();
            $table->string('busca_4')->nullable();
            $table->string('parentesco_1')->nullable();
            $table->string('parentesco_2')->nullable();
            $table->string('parentesco_3')->nullable();
            $table->string('parentesco_4')->nullable();
            $table->string('desc_1')->nullable();
            $table->string('desc_2')->nullable();
            $table->string('desc_3')->nullable();
            $table->string('desc_4')->nullable();
            $table->string('desc_5')->nullable();
            $table->integer('diavencimento')->nullable();
            $table->longText('alergia')->nullable();
            $table->longText('convulsao')->nullable();
            $table->longText('pronto_socorro')->nullable();
            $table->longText('remedio')->nullable();
            $table->longText('fala')->nullable();
            $table->longText('audicao')->nullable();
            $table->longText('febre')->nullable();
            $table->longText('convenio')->nullable();
            $table->longText('recomendacao')->nullable();
            $table->longText('natacao')->nullable();
            $table->longText('obs')->nullable();
            $table->timestamps();
        });
    }
}
