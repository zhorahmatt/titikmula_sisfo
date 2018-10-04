<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('nama_roles', 'administrator')->first();
        $rolePustakawan = Role::where('nama_roles', 'pustakawan')->first();

        //user admin
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@titikmula.com';
        $admin->password = bcrypt('admin12345');
        $admin->save();
        $admin->roles()->attach($roleAdmin);

        //user pustakawan
        $pustakawan = new User;
        $pustakawan->name = 'pustakawan';
        $pustakawan->email = 'pustakawan@titikmula.com';
        $pustakawan->password = bcrypt('pustakawan12345');
        $pustakawan->save();
        $pustakawan->roles()->attach($rolePustakawan);
    }
}
