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
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ganadero_id')->nullable();
            $table->string('peso');
            $table->string('codigo')->unique();
            $table->string('raza');
            $table->string('color');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->string('galera')->nullable();
            $table->foreign('ganadero_id')->references('id')->on('ganaderos')->onDelete('cascade');
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
        Schema::dropIfExists('animales');
    }
};
