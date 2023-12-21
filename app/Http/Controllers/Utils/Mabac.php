<?php


namespace App\Http\Controllers\utils;

use Illuminate\Support\Facades\DB;

class Mabac
{

    public function bobot_alternatif()
{
    $data_alternatif = array();

    // Fetch data from the electre_evaluations table
    $matriks = DB::table('evaluations')
        ->select('*')
        ->orderBy('alternatives_id')
        ->orderBy('criterias_id')
        ->get();
   
    // Iterate through the data and organize it into an array
    foreach ($matriks as $index => $item) {
        // Check if criterias_id is not null
        if (!is_null($item->criterias_id)) {
            $criteriaKey = 'K' . str_pad($item->criterias_id, 2, '0', STR_PAD_LEFT);

            if (!isset($data_alternatif[$item->alternatives_id])) {
                $data_alternatif[$item->alternatives_id] = array();
            }

            $data_alternatif[$item->alternatives_id][$criteriaKey] = $item->value;
        }
    }

    return $data_alternatif;
}


    public function matrix_keputusan()
    {
        $data_alternatif = array();

        // Fetch data from the electre_evaluations table
        $matriks = DB::table('evaluations')
            ->select('*')
            ->orderBy('alternatives_id')
            ->orderBy('criterias_id')
            ->get();

        // Fetch weights from the criterias table
        $weights = DB::table('criterias')
            ->select('bobot2')
            ->orderBy('id')
            ->get();

        $bobot_kriteria = $weights->toArray();

        // Iterate through the data and organize it into an array
        foreach ($matriks as $index => $item) {
            // Check if criterias_id is not null
            if (!is_null($item->criterias_id)) {
                if (!isset($data_alternatif[$item->alternatives_id])) {
                    $data_alternatif[$item->alternatives_id] = array();
                }

                $data_alternatif[$item->alternatives_id][] = $item->value;
            }
        }

        // Rest of the code remains the same
        // $this->getMaxMin($data_alternatif);
        // $matrix_normalisasi = $this->matrix_normalisasi($data_alternatif);
        // $this->matrik_normalisasi = $matrix_normalisasi;
        // $matrix_tertimbang = $this->matrix_tertimbang($matrix_normalisasi);
        // $this->matrik_retimbang = $matrix_tertimbang;
        // $matrix_perbatasan = $this->matrix_perbatasan($matrix_tertimbang);
        // $this->matrik_perbatasan = $matrix_perbatasan;
        // $matrix_Q = $this->matrix_Q($matrix_tertimbang, $matrix_perbatasan);
        // $this->matrik_Q = $matrix_Q;
        // $hasil_rangking = $this->matrix_rangking($matrix_Q);
        // $this->hasil_rangking = $hasil_rangking;

        return $data_alternatif;
    }


    public function getMax($array_matrik_keputusan)
    {
        $max_bobot = [];
        if (!empty($array_matrik_keputusan)) {
            // Get the number of criteria dynamically
            $num_criteria = count(current($array_matrik_keputusan));
            
            for ($i = 0; $i < $num_criteria; $i++) {
                $max_bobot[$i] = max(array_column($array_matrik_keputusan, $i));
            }
        }

        return $max_bobot;
    }



    public function getMin($array_matrik_keputusan)
    {
        $min_bobot = [];
        if (!empty($array_matrik_keputusan)) {
            // Get the number of criteria dynamically
            $num_criteria = count(current($array_matrik_keputusan));
            
            for ($i = 0; $i < $num_criteria; $i++) {
                $min_bobot[$i] = min(array_column($array_matrik_keputusan, $i));
            }
        }
        return $min_bobot;
    }

    public function matrix_normalisasi($array_matrik_keputusan, $max_bobot, $min_bobot)
    {
        if (!empty($array_matrik_keputusan)) {
            foreach ($array_matrik_keputusan as $key => $data_item) {
                foreach ($data_item as $key_data => $item) {
                    $x = ($item - $min_bobot[$key_data]);

                    if (!empty($x) && !empty($max_bobot[$key_data] - $min_bobot[$key_data])) {
                        $x /= ($max_bobot[$key_data] - $min_bobot[$key_data]);
                    } else {
                        $x = 0;
                    }

                    $array_matrik_keputusan[$key][$key_data] = $x;
                }
            }
        }

        return $array_matrik_keputusan;
    }


    public function matrix_tertimbang($matrix_normalisasi, $bobot_kriteria)
    {
        if (!empty($matrix_normalisasi) && !empty($bobot_kriteria)) {
            foreach ($matrix_normalisasi as $i => $data_item) {
                foreach ($data_item as $j => $item) {
                    $matrix_normalisasi[$i][$j] = ($item * $bobot_kriteria[$j]) + $bobot_kriteria[$j];
                }
            }
        }
        return $matrix_normalisasi;
    }


    public function matrix_perbatasan($matrix_tertimbang)
    {
        $container = [];
        if (!empty($matrix_tertimbang)) {
            for ($i = 0; $i < 8; $i++) {
                $container[$i] = $this->calculate_G(array_column($matrix_tertimbang, $i));
            }
        }
        return $container;
    }

    private function calculate_G($data)
    {
        $g = 1;
        foreach ($data as $item) {
            $g *= $item;
        }
        return round(pow($g, 1/30),3);
    }

    public function matrix_Q($matrix_tertimbang, $matrix_perbatasan)
    {
        if (!empty($matrix_tertimbang) && !empty($matrix_perbatasan)) {
            foreach ($matrix_tertimbang as $i => $data_alternatif) {
                foreach ($data_alternatif as $j => $data_kriteria) {
                    // Check if the key exists in $matrix_perbatasan before accessing it
                    if (isset($matrix_perbatasan[$j])) {
                        $matrix_tertimbang[$i][$j] -= $matrix_perbatasan[$j];
                    } else {
                        // Handle the case where the key is not found, e.g., provide a default value
                        // You can modify this part based on your requirements
                        $matrix_tertimbang[$i][$j] -= 0;
                    }
                }
            }
        }
        return $matrix_tertimbang;
    }



    public function matrix_rangking($matrix_Q)
    {
       if(!empty($matrix_Q)){
            // $container = [];    
            // foreach($matrix_Q as $i=> $alternatif){
            //     $Q = 0;
            //     foreach($alternatif as $j => $kriteria){
            //         $Q+=$matrix_Q[$i][$j];
            //     }
            //     $container[$i]=$Q;
            // }
            $container = [];
            for($i = 1; $i <= count($matrix_Q); $i++){
                $temp = 0;
                for($j = 0; $j < count($matrix_Q[$i]); $j++){
                    
                    $temp += ($matrix_Q[$i][$j]);
                   
                }
                $container[$i] = $temp;
            }
            return $container;
        }
    }
    
}