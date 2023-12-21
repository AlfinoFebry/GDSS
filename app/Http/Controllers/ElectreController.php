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

        return view('electre', [
            'array' => $array,
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
            'ranking' => $ranking,
            'aggregateRanking' => $aggregateRanking,
        ]);
    }
}
