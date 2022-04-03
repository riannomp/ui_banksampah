<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nama = ['Agus','Budi','Bambang'];
        $no_telp = ['0823423','088856','08746467'];
        $alamat = ['Taman', 'Kartoharjo', 'Demangan'];
        $id_karyawan = [1,2,3];

        for ($i=0; $i < count($nama) ; $i++) {
            Karyawan::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_telp' => $no_telp[$i],
                'id_karyawan' => $id_karyawan[$i],
            ]);
        }
    }
}
