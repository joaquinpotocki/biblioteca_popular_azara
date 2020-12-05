<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Permission::create(['name' => 'all']);
        Role::create(['name' => 'bibliotecario']);
        $user = User::first();
        $user->assignRole('admin');
    }
}
