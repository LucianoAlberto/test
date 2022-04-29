<?php

namespace Database\Seeders;

use App\Models\Ambito;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmbitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ambito::create(['nombre' => 'Ingeniería']);
        Ambito::create(['nombre' => 'Publicidad']);
    }
}
