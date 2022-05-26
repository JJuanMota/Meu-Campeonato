<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function novoCampeonato()
    {
        return view('novoCampeonato');
    }

    public function createCamp(Request $request)
    {

    }
}
