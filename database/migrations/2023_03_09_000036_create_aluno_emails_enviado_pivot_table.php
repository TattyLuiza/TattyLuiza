<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoEmailsEnviadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('aluno_emails_enviado', function (Blueprint $table) {
            $table->unsignedBigInteger('emails_enviado_id');
            $table->foreign('emails_enviado_id', 'emails_enviado_id_fk_8031170')->references('id')->on('emails_enviados')->onDelete('cascade');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id', 'aluno_id_fk_8031170')->references('id')->on('alunos')->onDelete('cascade');
        });
    }
}
