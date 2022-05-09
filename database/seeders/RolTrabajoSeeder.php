<?php

namespace Database\Seeders;

use App\Models\RolTrabajo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolTrabajo::create(['rol' => 'Ingeniería']);
        RolTrabajo::create(['rol' => 'Publicidad']);
    }
}
