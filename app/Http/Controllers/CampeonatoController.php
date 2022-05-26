<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function novoCampeonato()
    {
        return view('novoCampeonato');
    }

    public function createCamp(Request $request)
    {
        $campeonato = new Campeonato();
        $campeonato->nome = $request->nome;
        $campeonato->time_1 = $request->time_1;
        $campeonato->time_2 = $request->time_2;
        $campeonato->time_3 = $request->time_3;
        $campeonato->time_4 = $request->time_4;
        $campeonato->time_5 = $request->time_5;
        $campeonato->time_6 = $request->time_6;
        $campeonato->time_7 = $request->time_7;
        $campeonato->time_8 = $request->time_8;
        $campeonato->save();
        return $this->novoCampeonato();
    }
}
