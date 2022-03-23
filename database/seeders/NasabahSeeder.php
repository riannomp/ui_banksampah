<?php

namespace Database\Seeders;

use App\Models\Nasabah;
use Illuminate\Database\Seeder;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode = ['USR001'];
        $nama = ['Anno'];
        $alamat = ['Madiun'];
        $no_telp = ['09567876'];
        $id_user = [4];

        for ($i=0; $i < count($nama) ; $i++) {
            Nasabah::create([
                'kode_nasabah' => $kode[$i],
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_user' => $id_user[$i]
            ]);
        }

    }
}
