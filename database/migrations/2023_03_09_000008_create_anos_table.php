<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnosTable extends Migration
{
    public function up()
    {
        Schema::create('anos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ano');
            $table->string('logomarca')->nullable();
            $table->string('escola')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('portaria_1')->nullable();
            $table->string('portaria_2')->nullable();
            $table->string('portaria_3')->nullable();
            $table->string('portaria_4')->nullable();
            $table->string('portaria_5')->nullable();
            $table->string('portaria_6')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('telefones')->nullable();
            $table->string('cidade')->nullable();
            $table->string('email')->nullable();
            $table->string('url')->nullable();
            $table->string('boletim')->nullable();
            $table->string('falta')->nullable();
            $table->integer('bim_1');
            $table->integer('bim_2');
            $table->integer('bim_3');
            $table->integer('bim_4');
            $table->decimal('valor_1', 15, 2);
            $table->string('desc_1')->nullable();
            $table->decimal('valor_2', 15, 2);
            $table->string('desc_2')->nullable();
            $table->decimal('valor_3', 15, 2);
            $table->string('desc_3')->nullable();
            $table->decimal('valor_4', 15, 2);
            $table->string('desc_4')->nullable();
            $table->decimal('valor_5', 15, 2);
            $table->string('desc_5')->nullable();
            $table->integer('prof_recado');
            $table->integer('prof_tarefa');
            $table->date('datai_1');
            $table->date('dataf_1');
            $table->date('datai_2');
            $table->date('dataf_2');
            $table->date('datai_3');
            $table->date('dataf_3');
            $table->date('datai_4');
            $table->date('dataf_4');
            $table->integer('diapgto');
            $table->string('mora_1')->nullable();
            $table->string('multa_1')->nullable();
            $table->string('instrucao_1')->nullable();
            $table->string('mora_2')->nullable();
            $table->string('multa_2')->nullable();
            $table->string('instrucao_2')->nullable();
            $table->string('mora_3')->nullable();
            $table->string('multa_3')->nullable();
            $table->string('instrucao_3')->nullable();
            $table->string('mora_4')->nullable();
            $table->string('multa_4')->nullable();
            $table->string('instrucao_4')->nullable();
            $table->integer('dia_vencimento');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
