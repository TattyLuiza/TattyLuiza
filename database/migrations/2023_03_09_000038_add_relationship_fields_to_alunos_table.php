<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAlunosTable extends Migration
{
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->unsignedBigInteger('mae_id')->nullable();
            $table->foreign('mae_id', 'mae_fk_8087609')->references('id')->on('responsaveis');
            $table->unsignedBigInteger('pai_id')->nullable();
            $table->foreign('pai_id', 'pai_fk_8087610')->references('id')->on('responsaveis');
            $table->unsignedBigInteger('financeiro_id')->nullable();
            $table->foreign('financeiro_id', 'financeiro_fk_8070597')->references('id')->on('responsaveis');
        });
    }
}
