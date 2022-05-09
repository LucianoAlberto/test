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
        Ambito::insert([
            [
                'nombre' => 'Pagina-Web',
                "created_at" => now('Europe/Madrid'),
                "updated_at" => now('Europe/Madrid'),
            ],       
        ]);

        Ambito::insert([
            [
                'nombre' => 'Publicidad',
                "created_at" => now('Europe/Madrid'),
                "updated_at" => now('Europe/Madrid'),
            ],       
        ]);

        Ambito::insert([
            [
                'nombre' => 'Servicios',
                "created_at" => now('Europe/Madrid'),
                "updated_at" => now('Europe/Madrid'),
            ],       
        ]);
    }
}
