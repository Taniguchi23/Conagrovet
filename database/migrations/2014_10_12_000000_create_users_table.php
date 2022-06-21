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
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dni',8)->nullable();
            $table->char('sexo',1)->comment('H:Hombre | M:Mujer');
            $table->char('tipo',1)->default('C')->comment('A:Administrador | C: Cliente | E:Empleado | D:Doctor');
            $table->string('direccion',200)->nullable();
            $table->string('imagen',65)->nullable();
            $table->char('estado',1)->default('A');
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
