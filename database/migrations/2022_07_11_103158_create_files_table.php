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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cita_id')->references('id')->on('citas');
            $table->float('peso',8,3);
            $table->string('f_card');
            $table->string('f_resp');
            $table->string('diagnostico');
            $table->text('descripcion')->nullable();
            $table->char('tratamiento')->default('N')->comment('S:si | N:no');
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
        Schema::dropIfExists('files');
    }
};
