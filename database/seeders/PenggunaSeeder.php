<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->insert([
            'name' => 'Khoirul Wahyudin',
            'alamat' => 'Kota Malang',
            'keluhan' => 'Kucing Sakit',
            'email' => 'khoiruludin@gmail.com',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
