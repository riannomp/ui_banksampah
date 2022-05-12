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
        $foto = ['profile.png'];
        $no_hp = ['0986789323'];
        $id_user = [3];

        for ($i=0; $i < count($nama) ; $i++) {
            Kepala::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'foto' => $foto[$i],
                'no_hp' => $no_hp[$i],
                'id_user' => $id_user[$i]
            ]);
        }
    }
}
