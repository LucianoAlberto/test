<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Contrato;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AmbitoSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            AmbitoSeeder::class,
        ]);

        Cliente::factory(15)->create();
        Contrato::factory(15)->create();
        //Factura::factory(5)->create();
    }
}
