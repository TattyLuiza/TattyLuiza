<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status');
            $table->string('aluno_nome');
            $table->string('mae_nome')->nullable();
            $table->string('pai_nome')->nullable();
            $table->string('turno')->nullable();
            $table->string('turma_nome')->nullable();
            $table->decimal('valor', 15, 2);
            $table->decimal('desconto', 15, 2)->nullable();
            $table->decimal('total', 15, 2);
            $table->longText('conceito_1')->nullable();
            $table->longText('conceito_2')->nullable();
            $table->longText('conceito_3')->nullable();
            $table->longText('conceito_4')->nullable();
            $table->longText('conceitofinal')->nullable();
            $table->longText('obs')->nullable();
            $table->integer('falta_1')->nullable();
            $table->integer('falta_2')->nullable();
            $table->integer('falta_3')->nullable();
            $table->integer('falta_4')->nullable();
            $table->integer('faltaf')->nullable();
            $table->date('data_transferencia')->nullable();
            $table->longText('obs_transferencia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
