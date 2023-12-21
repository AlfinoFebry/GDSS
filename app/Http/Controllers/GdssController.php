<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GdssController extends Controller
{
    public function index()
    {
        $mabacController = new MabacController();
        $electreController = new ElectreController();

        $mabacRanking = $mabacController->index()['matrik_rangking'];

        $electreRanking = $electreController->index()['ranking'];

        return view('gdss', [
            'mabacRanking' => $mabacRanking,
            'electreRanking' => $electreRanking,
        ]);
    }
}
