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
    ['nama' => 'Nilai IPK', 'bobot1' => 0.20, 'bobot2' => 0.15, 'bobotConcordance' => 5],
            ['nama' => 'Organisasi', 'bobot1' => 0.15, 'bobot2' => 0.20, 'bobotConcordance' => 3],            
            ['nama' => 'Prestasi Non-Akademik', 'bobot1' => 0.10, 'bobot2' => 0.12, 'bobotConcordance' => 4],
            ['nama' => 'Nilai Wawancara', 'bobot1' => 0.15, 'bobot2' => 0.18, 'bobotConcordance' =>2],
            ['nama' => 'Portofolio', 'bobot1' => 0.12, 'bobot2' => 0.10, 'bobotConcordance' =>2],
            ['nama' => 'Nilai Psikotes', 'bobot1' => 0.08, 'bobot2' => 0.10, 'bobotConcordance' =>5],
            ['nama' => 'Motivasi', 'bobot1' => 0.10, 'bobot2' => 0.05, 'bobotConcordance' =>3],
            ['nama' => 'Pengalaman', 'bobot1' => 0.10, 'bobot2' => 0.10, 'bobotConcordance' =>4],
        ];
    
        DB::table('criterias')->insert($data);
    }
}
