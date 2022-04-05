<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');//Autoincrementable
            $table->string('nombre',45);//Limite de 45 caracteres
            $table->string('description')->nullable();//Puede ser nulo
            $table->bigInteger('cupo')->nullable();//Puede ser nulo
            $table->enum('modalidad',['PRESENCIAL','VIRTUAL']);//Sin predeteminado
            $table->dateTime('fechaHora')->nullable();//Puede ser nulo
            $table->text('direccion')->nullable();//Puede ser nulo
            $table->double('costo')->nullable();//Puede ser nulo
            $table->string('duracion');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');//Comprobacion de clave externa
        Schema::dropIfExists('cursos'); //Elimina la tabla cuando se resetean las migraciones
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');//Comprobacion de clave externa
    }
}
