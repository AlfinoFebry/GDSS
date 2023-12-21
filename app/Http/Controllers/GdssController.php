<?php

namespace App\Http\Controllers;

use App\Http\Controllers\utils\Electre;
use App\Http\Controllers\utils\Mabac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GdssController extends Controller
{
    public function index()
    {

        $mabacRanking = $this->electre_rangking();


        $electreRanking = $this->mabac_ranking();

        return view('gdss', [
            'mabacRanking' => $mabacRanking,
            'electreRanking' => $electreRanking,
        ]);
    }

    public function electre_rangking(){
        $electre = new Electre();
        $matriks = DB::table('evaluations')
            ->select('*')
            ->orderBy('alternatives_id')
            ->orderBy('criterias_id')
            ->get();

        $weight = DB::table('criterias')
            ->select('bobot1')
            ->orderBy('id')
            ->get();

        $array = $electre->toArray($matriks);
        $normalized = $electre->normalizedMatrix($array);
        $preferensi = $electre->weightingNormalizedMatrix($normalized, $weight);

        $m = 30;
        $n = 8;
        $index = $electre->findConcordanceDiscordanceIndex($preferensi, $m, $n);

        $concordancematrix = $electre->findConcordanceMatrix($index['concordance'], $weight, $m);
        $disordancematrix = $electre->findDiscordanceMatrix($preferensi, $index['discordance'], $m, $n);

        $concordanceThreshold = $electre->findThresholdC($concordancematrix, $m);
        $discordanceThreshold = $electre->findThresholdD($disordancematrix, $m);

        $concordanceDominance = $electre->findConcordanceDominance($concordancematrix, $concordanceThreshold);
        $discordanceDominance = $electre->findDiscordanceDominance($disordancematrix, $discordanceThreshold);
        $aggregateDominance = $electre->findAggregateDominance($concordanceDominance, $discordanceDominance);

        $aggregateRanking = [];
        foreach ($aggregateDominance as $alternative => $criteriaValues) {
            $aggregateRanking[$alternative] = array_sum($criteriaValues);
        }

        arsort($aggregateRanking);

        $ranking = [];
        $rank = 1;
        foreach ($aggregateRanking as $alternative => $total) {
            $ranking[$alternative] = $rank++;
        }

        return $ranking;
    }

    public function mabac_ranking(){

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
        
        return $matrik_rangking;
    }

    public function gdss_rangking(){
        
    }
}
