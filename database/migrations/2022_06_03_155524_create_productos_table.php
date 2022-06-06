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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->references('id')->on('marcas');
            $table->string('nombre',200);
            $table->string('codigo_factura',50);
            $table->float('cantidad',8,2);
            $table->string('unidad')->default('und');
            $table->text('descripcion')->nullable();
            $table->char('estado')->default('E')->comment('E: existe | N: No existe | U:usado');
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
        Schema::dropIfExists('productos');
    }
};
