<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Efemeride;

class EfemerideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Efemeride::create([
            'titulo'=>'DIA DEL PLANETA',
            'image'=>'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Efemeride::create([
            'titulo'=>'DIA DEL ELEFANTE',
            'image'=>'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Efemeride::create([
            'titulo'=>'DIA DEL ARBOL',
            'image'=>'https://dummyimage.com/200x150/5c5756/fff'
        ]);

        Efemeride::create([
            'titulo'=>'DIA DEL LA VIDA MARINA',
            'image'=>'https://dummyimage.com/200x150/5c5756/fff'
        ]);
    }
}
