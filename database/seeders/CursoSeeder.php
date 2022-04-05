<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::create([
            'nombre'=>'RESIDUOS',
            'direccion'=>'Yautepec Morelos'
        ]);

        Curso::create([
            'nombre'=>'ODS',
            'direccion'=>'Yautepec Morelos'
        ]);

        Curso::create([
            'nombre'=>'IMPACTO HAMBIENTAL',
            'direccion'=>'Yautepec Morelos'
        ]);

        Curso::create([
            'nombre'=>'RESIDUO HAMBIENTAL',
            'direccion'=>'Yautepec Morelos'
        ]);
    }
}
