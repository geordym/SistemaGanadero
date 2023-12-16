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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('ganadero_id');
            $table->string('descripcion');
            $table->date('fecha_aplicacion');
            $table->decimal('costo');
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('animales')->onDelete('cascade');
            $table->foreign('ganadero_id')->references('id')->on('ganaderos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
