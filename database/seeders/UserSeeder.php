<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stringable;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $email = ['admin@admin.com','teller@teller.com','kepala@kepala.com', 'nasabah@nasabah.com', 'koor@koor.com'];
        // $id_role = [1,2,3,4,5];

        // for ($i=0; $i < count($email) ; $i++) {
        //     User::create([
        //         'email' => $email[$i],
        //         'password'=> Hash::make(123456),
        //         'id_role' => $id_role[$i],
        //         'status' => '1'
        //     ]);
        // }
        User::truncate();
        $admin = User::create([
            'email' => 'admin@admin.com',
            'id_karyawan' => '1',
            'password' => bcrypt('123456'),
            'level' => 'admin',
            'remember_token' => Str::random(60),
            'status' => '1',
            ]);
        $admin->save();

        $teller = User::create([
            'email' => 'teller@teller.com',
            'id_karyawan' => '2',
            'password' => bcrypt('123456'),
            'level' => 'teller',
            'remember_token' => Str::random(60),
            'status' => '1',
            ]);
        $teller->save();

        $kepala = User::create([
            'email' => 'kepala@kepala.com',
            'id_karyawan' => '3',
            'password' => bcrypt('123456'),
            'level' => 'kepala',
            'remember_token' => Str::random(60),
            'status' => '1',
            ]);
        $kepala->save();

        $nasabah = User::create([
            'email' => 'nasabah@nasabah.com',
            'id_nasabah' => '1',
            'password' => bcrypt('123456'),
            'level' => 'nasabah',
            'remember_token' => Str::random(60),
            'status' => '1',
            ]);
        $nasabah->save();

        $koor = User::create([
            'email' => 'koor@koor.com',
            'id_koor' => '1',
            'password' => bcrypt('123456'),
            'level' => 'koor',
            'remember_token' => Str::random(60),
            'status' => '1',
            ]);
        $koor->save();

    }
}
