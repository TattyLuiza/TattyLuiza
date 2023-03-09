<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletinsTable extends Migration
{
    public function up()
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('t_1')->nullable();
            $table->string('n_1')->nullable();
            $table->string('f_1')->nullable();
            $table->string('t_2')->nullable();
            $table->string('n_2')->nullable();
            $table->string('f_2')->nullable();
            $table->string('t_3')->nullable();
            $table->string('n_3')->nullable();
            $table->string('f_3')->nullable();
            $table->string('t_4')->nullable();
            $table->string('n_4')->nullable();
            $table->string('f_4')->nullable();
            $table->string('r_1')->nullable();
            $table->string('r_2')->nullable();
            $table->string('r_3')->nullable();
            $table->string('r_4')->nullable();
            $table->string('tr')->nullable();
            $table->string('tr_nota')->nullable();
            $table->string('t_falta')->nullable();
            $table->string('recuperacao')->nullable();
            $table->string('resultado')->nullable();
            $table->string('aluno_nome')->nullable();
            $table->string('turma_nome')->nullable();
            $table->string('materia_nome')->nullable();
            $table->string('abreviado_nome')->nullable();
            $table->string('professor_nome')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
