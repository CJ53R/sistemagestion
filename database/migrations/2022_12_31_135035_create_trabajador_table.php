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
        Schema::create('trabajador', function (Blueprint $table) {
            $table->id();
            $table->string('numDocumento', 12)->unique();
            $table->string('nombres',50);
            $table->string('apaterno',20);
            $table->string('amaterno',20);
            $table->date('fregistro');
            $table->date('fnacimiento');
            $table->string('telefono',9)->nullable();
            $table->string('direccion',200)->nullable();
            $table->string('email',200)->nullable();
            $table->unsignedBigInteger('tipodocumento_id');
            $table->foreign('tipodocumento_id')->references('id')->on('tipodocumentot')->onDelete('cascade');
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('generot')->onDelete('cascade');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('nivel_id')->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivel')->onDelete('cascade');
            $table->string('nivsec',200)->nullable();
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
        Schema::dropIfExists('trabajador');
    }
};
