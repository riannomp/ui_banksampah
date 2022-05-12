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
        $foto = ['profile.png'];
        $no_hp = ['09567876'];
        $nik = ['357653467'];

        for ($i=0; $i < count($nama) ; $i++) {
            Nasabah::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'foto' => $foto[$i],
                'no_hp' => $no_hp[$i],
                'nik' => $nik[$i]
            ]);
        }

    }
}
