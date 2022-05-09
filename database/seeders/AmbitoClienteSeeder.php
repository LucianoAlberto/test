<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AmbitoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ambito_cliente')->insert([
            [
                'ambito_id' => '1',
                'cliente_id'=>'1',
            ],       
        ]);

        DB::table('ambito_cliente')->insert([
            [
                'ambito_id' => '2',
                'cliente_id'=>'1',
            ],       
        ]);

        DB::table('ambito_cliente')->insert([
            [
                'ambito_id' => '3',
                'cliente_id'=>'1',
            ],       
        ]);
    }
}
