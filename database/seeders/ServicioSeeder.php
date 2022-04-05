<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'nombre'=>'AUDITORIA',
            'description'=>'Se realiza una auditoria',
            'costo'=>300
        ]);

        Servicio::create([
            'nombre'=>'MONITOREO',
            'description'=>'Se realiza un monitoreo',
            'costo'=>200
        ]);

        Servicio::create([
            'nombre'=>'CONTROL',
            'description'=>'Se realiza una control',
            'costo'=>100
        ]);

        Servicio::create([
            'nombre'=>'ISO',
            'description'=>'Se realiza la ejecucion de un ISO',
            'costo'=>500
        ]);
    }
}
