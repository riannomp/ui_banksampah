<?php

namespace Database\Seeders;

use App\Models\Kepala;
use Illuminate\Database\Seeder;

class KepalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Hari'];
        $alamat = ['Madiun'];
        $no_telp = ['0986789323'];
        $id_user = [3];

        for ($i=0; $i < count($nama) ; $i++) {
            Kepala::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_user' => $id_user[$i]
            ]);
        }
    }
}
