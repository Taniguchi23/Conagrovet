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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->references('id')->on('mascotas');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha_programacion');
            $table->char('estado',1)->default('A')->comment('A: Activo| D: Reprogramado | F: Finalizado |  R: Rechazado');
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
        Schema::dropIfExists('citas');
    }
};
