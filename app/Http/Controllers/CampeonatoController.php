<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampeonatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('index');
    }
    public function novoCampeonato()
    {
        return view('novoCampeonato');
    }

    public function listarBlade()
    {
        $campeonatos = Campeonato::where('user_id',Auth::user()->id)->get();
        return view('listar',[
            'campeonatos' => $campeonatos
        ]);
    }

    public function listaCampeonatos(Request $request)
    {
        $campeonato = Campeonato::find($request->id);

        return json_encode($campeonato);
    }

    public function createCampeonato(Request $request)
    {
        $campeonato = new Campeonato();
        $campeonato->nome       = $request->nome;
        $campeonato->user_id    = Auth::user()->id;
        $campeonato->time_1     = $request->time_1;
        $campeonato->time_2     = $request->time_2;
        $campeonato->time_3     = $request->time_3;
        $campeonato->time_4     = $request->time_4;
        $campeonato->time_5     = $request->time_5;
        $campeonato->time_6     = $request->time_6;
        $campeonato->time_7     = $request->time_7;
        $campeonato->time_8     = $request->time_8;
        $campeonato->save();
        return redirect('/simula');
    }

    public function simulaCampeonato()
    {
        $campeonatos = Campeonato::where('user_id',Auth::user()->id)->get();
        return view('index',[
            'campeonatos' => $campeonatos
        ]);
    }

    public function geraCampeonato(Request $request)
    {
        $campeonato = Campeonato::find($request->id);
        $times = [];
        for($i=1;$i <= 8;$i++) {
            array_push($times,$campeonato['time_'.$i]);
        }
        shuffle($times);
        return json_encode($times);
    }

    public function salvaCampeonato(Request $request)
    {
        $campeonato = Campeonato::find($request->id);
        $campeonato['vencedor'] = $request->primeiro;
        $campeonato['segundo_lugar'] = $request->segundo;
        $campeonato['terceiro_lugar'] = $request->terceiro;
        $campeonato->save();
        return true;
    }
}
