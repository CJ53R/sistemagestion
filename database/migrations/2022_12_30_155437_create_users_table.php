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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('password');
            $table->string('name');
            $table->unsignedBigInteger('tipousuario_id');
            $table->foreign('tipousuario_id')->references('id')->on('tipousuario')->onDelete('cascade');
            $table->unsignedBigInteger('estadouser_id');
            $table->foreign('estadouser_id')->references('id')->on('estadouser')->onDelete('cascade');
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->foreign('avatar_id')->references('id')->on('avatar')->onDelete('SET NULL');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
