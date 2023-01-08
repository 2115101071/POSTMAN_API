<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nama' => 'Kadek Yuda Mahendra',
            'nim' => '2115101071',
            'jenis_kelamin' => 'Laki - Laki',
            'status' => 'Aktif',
            'semester' => '3',
            'ipk' => '3.9'
        ]);
        
    }
}
