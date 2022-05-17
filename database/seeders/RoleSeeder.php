<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resetear roles y permisos "cacheados"
        //app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Crear los roles
        $admin = Role::create(['name' => 'superusuario']);
        $user = Role::create(['name' => 'user']);

        //crear los usuarios demo
        $usuarioAdmin = User::factory()->create([
            'name' => 'Ana',
            'email' => 'ana@admin.com',
            'password' => bcrypt('12345678'),
            'rol'=>'1'
        ]);
        $usuarioAdmin->assignRole($admin);

         //crear los usuarios demo
         $usuarioAdmin = User::factory()->create([
            'name' => 'Andrés',
            'email' => 'andres@admin.com',
            'password' => bcrypt('12345678'),
            'rol'=>'1'
        ]);
        $usuarioAdmin->assignRole($admin);

        $usuarioUser = User::factory()->create([
            'name' => 'Lupe',
           'email' => 'lupe@user.com',
           'password' => bcrypt('12345678'),
           'rol'=>'2',
        ]);
        $usuarioUser->assignRole($user);
    }
}
