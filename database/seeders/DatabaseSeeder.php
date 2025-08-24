<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

     

        /*$admin = User::factory()->create([
            'name' => 'Test',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');*/

        /*$user = User::factory()->create([
            'name' => 'Test',
            'email' => 'user@example.com',
        ]);*/
       // $user->assignRole('user');
       $this->call(clienteTableSeeder::class);

       
    }
}
