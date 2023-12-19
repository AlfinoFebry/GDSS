<?php


namespace App\Http\Controllers\utils;

use Illuminate\Support\Facades\DB;

class Mabac
{

    public $matrik_normalisasi=[];
    public $matrik_retimbang=[];
    public $matrik_perbatasan=[];
    public $matrik_Q=[];
    public $hasil_rangking=[];

    private $max_bobot = [];
    private $min_bobot = [];
    
    public function bobot_alternatif()
    {
        $data_alternatif = array();

        // Fetch data from the electre_evaluations table
        $matriks = DB::table('electre_evaluations')
            ->select('*')
            ->orderBy('alternative_id')
            ->orderBy('criteria_id')
            ->get();

        // Fetch weights from the criterias table
        $weights = DB::table('criterias')
            ->select('weight')
            ->orderBy('id')
            ->get();

        // Iterate through the data and organize it into an array
        foreach ($matriks as $index => $item) {
            $column = [];

            // Add 'alternative_id' as the first column
            $column['alternative_id'] = $item->alternative_id;

            // Check if criteria_id is not null
            if (!is_null($item->criteria_id)) {
                $criteriaKey = 'K' . str_pad($item->criteria_id, 2, '0', STR_PAD_LEFT);
                $column[$criteriaKey] = $item->value;

                // Add the column to the data array
                $data_alternatif[] = $column;
            }
        }

        // Assign weights to the corresponding criteria
        foreach ($data_alternatif as &$column) {
            foreach ($weights as $index => $weight) {
                $criteriaKey = 'K' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);

                // Check if the key exists before multiplying with the weight
                if (array_key_exists($criteriaKey, $column)) {
                    $column[$criteriaKey] *= $weight->weight;
                }
            }
        }

        return $data_alternatif;
    }





    public function matrix_keputusan($data_bobot_alternatif)
    {
        $container = [];

        if (!empty($data_bobot_alternatif)) {
            foreach ($data_bobot_alternatif as $alternatifData) {
                $column = [];
                
                // Assuming the criteria keys are dynamically named 'K01', 'K02', 'K03', ...
                for ($kriteria = 1; $kriteria <= 3; $kriteria++) {
                    $criteriaKey = 'K' . str_pad($kriteria, 2, '0', STR_PAD_LEFT);
                    
                    // Check if the key exists before assigning it to the container
                    if (isset($alternatifData[$criteriaKey])) {
                        $column[$criteriaKey] = $alternatifData[$criteriaKey];
                    }
                }

                // Assuming 'Kode' is a key in your $alternatifData
                $container[$alternatifData['alternative_id']] = $column;
            }
        }
        $this->getMaxMin($container);
        $matrix_normalisasi = $this->matrix_normalisasi($container);
        $this->matrik_normalisasi = $matrix_normalisasi;
        $matrix_tertimbang = $this->matrix_tertimbang($matrix_normalisasi);
        $this->matrik_retimbang = $matrix_tertimbang;
        $matrix_perbatasan = $this->matrix_perbatasan($matrix_tertimbang);
        $this->matrik_perbatasan = $matrix_perbatasan;
        $matrix_Q = $this->matrix_Q($matrix_tertimbang,$matrix_perbatasan);
        $this->matrik_Q = $matrix_Q;
        $hasil_rangking = $this->matrix_rangking($matrix_Q);
        $this->hasil_rangking = $hasil_rangking;
        return $container;
    }

    public function getMaxMin($array_matrik_keputusan)
    {
        if (!empty($array_matrik_keputusan)) {
            for ($i = 1; $i <= 3; $i++) {
                $this->max_bobot['K0' . $i] = max(array_column($array_matrik_keputusan, 'K0' . $i));
                $this->min_bobot['K0' . $i] = min(array_column($array_matrik_keputusan, 'K0' . $i));
            }
        }
        // dd($this->min_bobot);
    }

    public function matrix_normalisasi($array_matrik_keputusan)
    {
        if (!empty($array_matrik_keputusan)) {
            foreach ($array_matrik_keputusan as $key => $data_item) {
                foreach ($data_item as $key_data => $item) {
                    $x = ($item - $this->min_bobot[$key_data]);
                    if (!empty($x)) {
                        $x /= ($this->max_bobot[$key_data] - $this->min_bobot[$key_data]);
                    } else {
                        $x = 0;
                    }
                    $array_matrik_keputusan[$key][$key_data] = $x;
                }
            }
        }
        return $array_matrik_keputusan;
    }

    public function matrix_tertimbang($matrix_normalisasi)
    {
        # code...
        if (!empty($matrix_normalisasi)) {
            // dd($matrix_normalisasi);
            foreach ($matrix_normalisasi as $i => $data_item) {
                $v = 0;
                foreach ($data_item as $j => $item) {
                    $v = (($this->max_bobot[$j] * $item) + $this->max_bobot[$j]) + $this->max_bobot[$j];
                    $matrix_normalisasi[$i][$j] = $v;
                }
            }
        }
        return $matrix_normalisasi;
    }

    public function matrix_perbatasan($matrix_tertimbang)
    {
        $container = [];
        if (!empty($matrix_tertimbang)) {
            for ($i = 1; $i <= 3; $i++) {
                $container['K0' . $i] = $this->calculate_G(array_column($matrix_tertimbang, 'K0' . $i));
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
        return round(pow($g, 1/5),2);
    }

    public function matrix_Q($matrix_tertimbang, $matrix_perbatasan)
    {
        if(!empty($matrix_tertimbang) && !empty($matrix_perbatasan)){
            foreach($matrix_tertimbang as $i=> $data_alternatif){
                foreach($data_alternatif as $j => $data_kriteria){
                    $matrix_tertimbang[$i][$j] -= $matrix_perbatasan[$j];
                }
            }
        }
        return $matrix_tertimbang;
    }

    public function matrix_rangking($matrix_Q)
    {
       if(!empty($matrix_Q)){
            $container = [];    
            foreach($matrix_Q as $i=> $alternatif){
                $Q = 0;
                foreach($alternatif as $j => $kriteria){
                    $Q+=$matrix_Q[$i][$j];
                }
                $container[$i]=$Q;
            }
            return $container;
        }
    }
    
}