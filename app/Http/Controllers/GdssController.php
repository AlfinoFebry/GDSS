<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GdssController extends Controller
{
    public function index()
    {
        // Data dari perankingan Mabac
        $mabacController = new MabacController();
        $mabacData = $mabacController->index()->getData();

        // Data dari perankingan Electre
        $electreController = new ElectreController();
        $electreData = $electreController->index()->getData();

        return view('gdss', [
            'mabacData' => $mabacData,
            'electreData' => $electreData,
        ]);
    }
}
