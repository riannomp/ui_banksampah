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
        $no_telp = ['087653456'];

        for ($i=0; $i < count($nama) ; $i++) {
            Koordinator::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i]
            ]);
        }
    }
}
