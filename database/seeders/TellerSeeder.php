<?php

namespace Database\Seeders;

use App\Models\Teller;
use Illuminate\Database\Seeder;

class TellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Bambang'];
        $alamat = ['Kediri'];
        $no_telp = ['09745678'];
        $id_user = [2];

        for ($i=0; $i < count($nama) ; $i++) {
            Teller::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_user' => $id_user[$i]
            ]);
        }
    }
}
