<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Agus'];
        $alamat = ['Blitar'];
        $no_telp = ['08912876354'];
        $id_user = [1];

        for ($i=0; $i < count($nama) ; $i++) {
            Admin::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_user' => $id_user[$i]
            ]);
        }
    }
}
