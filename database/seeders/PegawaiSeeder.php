<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Agus','Budi','Bambang'];
        $no_hp = ['0823423','088856','08746467'];
        $alamat = ['Taman', 'Kartoharjo', 'Demangan'];
        $id_pegawai = [1,2,3];

        for ($i=0; $i < count($nama) ; $i++) {
            Pegawai::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_hp' => $no_hp[$i],
                'id_pegawai' => $id_pegawai[$i],
            ]);
        }
    }
}
