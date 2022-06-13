<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo::insert([
            [
                'nombre' => 'Perro',
            ],
            [
                'nombre' => 'Gato',
            ],
            [
                'nombre' => 'Insecto',
            ],
            [
                'nombre' => 'Pez',
            ],
        ]);
    }
}
