<?php

namespace Database\Seeders;

use App\Models\Teller;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // \App\Models\User::factory(10)->create();
         $this->call([
            KaryawanSeeder::class,
            NasabahSeeder::class,
            KoordinatorSeeder::class,
            UserSeeder::class,
            JenisSeeder::class,
        ]);
    }
}
