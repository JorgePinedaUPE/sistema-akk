<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_servicio', function (Blueprint $table) {
            $table->id();
            $table->integer('folio')->nullable();
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('servicio_id');
            $table->enum('statusPago',['SIN PAGAR','PAGADO']);
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');;
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
        Schema::dropIfExists('solicitud_servicio');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
