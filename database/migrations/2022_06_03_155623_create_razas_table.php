<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('razas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animale_id')->references('id')->on('animales');
            $table->string('nombre',50);
            $table->integer('presentacion')->nullable();
            $table->char('estado',1)->default('A')->comment('A:activo|B:inactivo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('razas');
    }
};
