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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('raza_id')->references('id')->on('razas');
            $table->string('nombre',50);
            $table->char('sexo',1)->default('M')->comment('M:Macho | H:Hembra');
            $table->dateTime('fecha_nacimiento');
            $table->float('peso',7,3);
            $table->string('color',50);
            $table->string('descripcion',200)->nullable();
            $table->char('esterilizado',1)->default('N')->comment('N:No | S:Si');
            $table->char('estado',1)->default('V')->comment('V:vivo | F:Fallecido');
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
        Schema::dropIfExists('mascotas');
    }
};
