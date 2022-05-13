<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Contrato;
use App\Models\ConceptoFactura;
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

        Cliente::factory(15)->create();
        ConceptoFactura::factory(3)->create();
        Contrato::factory(15)->create();

        $this->call([
            RoleSeeder::class,
            AmbitoSeeder::class,
            AmbitoClienteSeeder::class,
        ]);

    }
}
