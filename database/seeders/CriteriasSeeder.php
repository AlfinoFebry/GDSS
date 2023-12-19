<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Nilai IPK', 'bobot1' => 0.20, 'bobot2' => 0.15],
            ['nama' => 'Organisasi', 'bobot1' => 0.15, 'bobot2' => 0.20],
            ['nama' => 'Prestasi Non-Akademik', 'bobot1' => 0.10, 'bobot2' => 0.12],
            ['nama' => 'Nilai Wawancara', 'bobot1' => 0.15, 'bobot2' => 0.18],
            ['nama' => 'Portofolio', 'bobot1' => 0.12, 'bobot2' => 0.10],
            ['nama' => 'Nilai Psikotes', 'bobot1' => 0.08, 'bobot2' => 0.10],
            ['nama' => 'Motivasi', 'bobot1' => 0.10, 'bobot2' => 0.05],
            ['nama' => 'Pengalaman', 'bobot1' => 0.10, 'bobot2' => 0.10],
        ];
    
        DB::table('criterias')->insert($data);
    }
}
