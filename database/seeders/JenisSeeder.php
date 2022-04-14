<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Besi','Kertas','Daun'];
        $id_jenis= ['BSI001','KRT001','DAU001'];

        for ($i=0; $i < count($nama) ; $i++) {
            Jenis::create([
                'nama' => $nama[$i],
                'id_jenis' => $id_jenis[$i],
            ]);
        }
    }
}
