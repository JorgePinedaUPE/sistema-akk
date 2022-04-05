<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->integer('folio')->nullable();
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('curso_id');
            $table->enum('statusPago',['SIN PAGAR','PAGADO']);
            $table->enum('segumiento',['CURSANDO','TERMINADO']);
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');;
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
        Schema::dropIfExists('inscripciones');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
