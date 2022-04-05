<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'nombre'=>'Jorge',
            'apellidoPaterno'=>'Pineda',
            'apellidoMaterno'=>'Araujo',
            'numSeguro'=>'123456789',
            'puesto'=>'Sistemas'
        ]);

        Empleado::create([
            'nombre'=>'Jose',
            'apellidoPaterno'=>'Salazar',
            'apellidoMaterno'=>'Diaz',
            'numSeguro'=>'123456710',
            'puesto'=>'Recursos'
        ]);

        Empleado::create([
            'nombre'=>'Maria',
            'apellidoPaterno'=>'Garcia',
            'apellidoMaterno'=>'Perez',
            'numSeguro'=>'123456711',
            'puesto'=>'Administracion'
        ]);

        Empleado::create([
            'nombre'=>'Ramon',
            'apellidoPaterno'=>'Lopez',
            'apellidoMaterno'=>'Perez',
            'numSeguro'=>'123456712',
            'puesto'=>'Contaduria'
        ]);
    }
}
