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
        $nama = ['Agus Sukirman', 'Budi Sujatmiko', 'Bambang Harun', 'Burhan Kamela'];
        $no_hp = ['0823423', '088856', '08746467', '0867272617'];
        $alamat = ['Jl. Ciliwung 44 Kelurahan Taman', 'Jl. H.Agus Salim Kelurahan Kartoharjo', 'Jl. Kalimantan Kelurahan Demangan', 'Jl. H. Agus Salim'];
        $id_pegawai = [1, 2, 3, 4];
        $foto = ['profile.png', 'profile.png', 'profile.png', 'profile.png'];

        for ($i = 0; $i < count($nama); $i++) {
            Pegawai::create([
                'nama' => $nama[$i],
                'alamat' => $alamat[$i],
                'no_hp' => $no_hp[$i],
                'foto' => $foto[$i],
                'id_pegawai' => $id_pegawai[$i],
            ]);
        }
    }
}
