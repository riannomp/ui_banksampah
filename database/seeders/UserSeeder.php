<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = ['admin@admin.com','teller@teller.com','kepala@kepala.com', 'nasabah@nasabah.com', 'koor@koor.com'];
        $id_role = [1,2,3,4,5];

        for ($i=0; $i < count($email) ; $i++) {
            User::create([
                'email' => $email[$i],
                'password'=> Hash::make(123456),
                'id_role' => $id_role[$i],
                'status' => '1'
            ]);
        }
    }
}
