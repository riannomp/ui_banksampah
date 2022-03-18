<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Admin','Teller','Kepala','Nasabah','Koordinator'];

        foreach ($nama as $value) {
            $role = Role::create([
                'nama' => $value
            ]);
        }
    }
}
