<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role;
        $admin->nama_roles = 'administrator';
        $admin->keterangan = 'role administrator';
        $admin->status = 1;
        $admin->save();

        $pustakawan = new Role;
        $pustakawan->nama_roles = 'pustakawan';
        $pustakawan->keterangan = 'role pustakawan';
        $pustakawan->status = 1;
        $pustakawan->save();
    }
}
