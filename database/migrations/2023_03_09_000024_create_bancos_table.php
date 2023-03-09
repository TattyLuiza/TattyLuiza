<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('padrao');
            $table->integer('listar');
            $table->integer('cod')->nullable();
            $table->string('nome')->nullable();
            $table->string('beneficiario')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('banco')->nullable();
            $table->decimal('taxa', 15, 2)->nullable();
            $table->integer('agencia')->nullable();
            $table->integer('agencia_dv')->nullable();
            $table->integer('conta')->nullable();
            $table->integer('conta_dv')->nullable();
            $table->integer('cedente')->nullable();
            $table->integer('cedente_dv')->nullable();
            $table->integer('carteira')->nullable();
            $table->string('arquivo')->nullable();
            $table->longText('instrucoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
