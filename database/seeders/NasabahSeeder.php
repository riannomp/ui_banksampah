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
        $nama = ['Anno'];
        $alamat = ['Madiun'];
        $no_telp = ['09567876'];
        $id_user = [4];

        for ($i=0; $i < count($nama) ; $i++) {
            Nasabah::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_user' => $id_user[$i]
            ]);
        }
    }
}
