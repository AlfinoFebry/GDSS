<?php

namespace App\Http\Controllers;

use App\Http\Controllers\utils\Mabac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MabacController extends Controller
{
    public function index()
    {
        # code...
        $metode = new Mabac();

        $weights = DB::table('criterias')
            ->select('bobot2')
            ->orderBy('id')
            ->get()
            ->pluck('bobot2')
            ->toArray();

        $matriks_keputusan = $metode->matrix_keputusan();
        $max_bobot = $metode->getMax($matriks_keputusan);
        $min_bobot = $metode->getMin($matriks_keputusan);
        $matrix_normalisasi = $metode->matrix_normalisasi($matriks_keputusan, $max_bobot, $min_bobot);
        $matrik_retimbang = $metode->matrix_tertimbang($matrix_normalisasi, $weights);
        $matrik_perbatasan = $metode->matrix_perbatasan($matrik_retimbang);
        $matrik_Q = $metode->matrix_Q($matrik_retimbang, $matrik_perbatasan);
        $matrik_rangking = $metode->matrix_rangking($matrik_Q);
        arsort($matrik_rangking);
        return view('mabac', [
            'matriks_keputusan'=>$matriks_keputusan,
            'matrix_normalisasi'=>$matrix_normalisasi,
            'matrik_retimbang'=>$matrik_retimbang,
            'matrik_perbatasan'=>$matrik_perbatasan,
            'matrik_Q'=>$matrik_Q,
            'matrik_rangking'=>$matrik_rangking,
        ]);
    }
}
