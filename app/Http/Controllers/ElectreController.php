<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\utils\Electre;

class ElectreController extends Controller
{
    public function index()
    {
        $electre = new Electre();
        $matriks = DB::table('electre_evaluations')
                ->select('*')
                ->orderBy('alternative_id')
                ->orderBy('criteria_id')
                ->get();
        
        $weight = DB::table('criterias')
                ->select('weight')
                ->orderBy('id')
                ->get();

        $array = $electre->toArray($matriks);
        print_r($array);
        $normalized = $electre->normalizedMatrix($array);
        $preferensi = $electre->weightingNormalizedMatrix($normalized, $weight);

        $m = 5;
        $n = 5;
        $index = $electre->findConcordanceDiscordanceIndex($preferensi, $m, $n);

        $concordancematrix = $electre->findConcordanceMatrix($index['concordance'], $weight, $m);
        $disordancematrix = $electre->findDiscordanceMatrix($preferensi, $index['discordance'], $m, $n);

        $concordanceThreshold = $electre->findThresholdC($concordancematrix, $m);
        $discordanceThreshold = $electre->findThresholdD($disordancematrix, $m);

        $concordanceDominance = $electre->findConcordanceDominance($concordancematrix, $concordanceThreshold);
        $discordanceDominance = $electre->findDiscordanceDominance($disordancematrix, $discordanceThreshold);
        $aggregateDominance = $electre->findAggregateDominance($concordanceDominance, $discordanceDominance);  

        return view('electre', [
            'array'=> $array, 
            'normalized' => $normalized,
            'weight' => $weight,
            'preferensi' => $preferensi,
            'concordanceIndex' => $index['concordance'],
            'discordanceIndex' => $index['discordance'],
            'concordanceMatrix' => $concordancematrix,
            'discordanceMatrix' => $disordancematrix,
            'concordanceThreshold' => $concordanceThreshold,
            'discordanceThreshold' => $discordanceThreshold,
            'concordanceDominance' => $concordanceDominance,
            'discordanceDominance' => $discordanceDominance,
            'aggregateDominance' => $aggregateDominance,
        ]);
    }
}
