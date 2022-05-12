<?php

namespace Database\Seeders;

use App\Models\Sampah;
use Illuminate\Database\Seeder;

class SampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_sampah = ['KAR001', 'BES001', 'DAU001'];
        $id_jenis = ['KRT001','BSI001','DAU001'];
        $nama = ['Kardus Aqua', 'Besi Bekas', 'Daun Kering'];
        $harga_nsb = ['3500','4000','2000'];
        $harga_koor = ['3000', '3500', '1500'];
        $gambar = ['no_image.png','no_image.png','no_image.png'];

        for ($i=0; $i < count($nama) ; $i++) {
            Sampah::create([
                'nama' => $nama[$i],
                'id_sampah' =>$id_sampah[$i],
                'id_jenis' =>$id_jenis[$i],
                'harga_nasabah' =>$harga_nsb[$i],
                'harga_koordinator' =>$harga_koor[$i],
                'gambar' =>$gambar[$i]
            ]);
        }
    }
}
