<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticia', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 200);
            $table->date('fpublicacion');
            $table->string('shortdescripcion', 250);
            $table->text('largedescripcion', 1500);
            $table->unsignedBigInteger('estadonoticia_id');
            $table->foreign('estadonoticia_id')->references('id')->on('estadonoticia')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticia');
    }
};
