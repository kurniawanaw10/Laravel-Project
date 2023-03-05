<?php

namespace Database\Seeders;

use App\Models\DataMobil;
use App\Models\User;
use App\Models\Wisata;
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
        User::create([
            'nama_user' => 'Admin',
            'alamat' => 'Jl. Arrahmah 3, Windan, Gumpang',
            'nomor_hp' => '081568446569',
            'nik' => '3311121611990001',
            'email' => 'adminpalingserius@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => '1',
        ]);
    }
}
