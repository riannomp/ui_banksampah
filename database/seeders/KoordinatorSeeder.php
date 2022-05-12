<?php

namespace Database\Seeders;

use App\Models\Koordinator;
use Illuminate\Database\Seeder;

class KoordinatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Mamad'];
        $alamat = ['Nglanduk'];
        $foto = ['profile.png'];
        $no_hp = ['087653456'];

        for ($i=0; $i < count($nama) ; $i++) {
            Koordinator::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'foto' => $foto[$i],
                'no_hp' => $no_hp[$i]
            ]);
        }
    }
}
