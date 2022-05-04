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
            'name' => 'Superusuario',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);
        $usuarioAdmin->assignRole($admin);

        $usuarioUser = User::factory()->create([
            'name' => 'Usuario Random',
           'email' => 'user@user.com',
           'password' => bcrypt('12345678'),
        ]);
        $usuarioUser->assignRole($user);
    }
}
