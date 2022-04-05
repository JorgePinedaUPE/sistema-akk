<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',45);
            $table->string('apellidoPaterno',45);
            $table->string('apellidoMaterno',45);
            $table->string('correo',50)->nullable();
            $table->string('telefono',10)->nullable();
            $table->string('numSeguro',12)->nullable();
            $table->string('puesto',20)->nullable();
            $table->string('tipoSangre',3)->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('empleados');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
