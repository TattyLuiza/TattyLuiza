<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemessasTable extends Migration
{
    public function up()
    {
        Schema::create('remessas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('texto')->nullable();
            $table->longText('erros')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
