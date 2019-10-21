<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Obra;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        
        $obras = Obra::orderBy('created_at', 'DESC')->paginate();

        $animes = Obra::where('categoria_id', 1)->orderBy('titulo')->get();

        $filmes = Obra::where('categoria_id', 2)->orderBy('titulo')->get();

        $series = Obra::where('categoria_id', 3)->orderBy('titulo')->get();

        $data = [
            'animes' => $animes,
            'filmes' => $filmes,
            'series' => $series,
        ];

        return view('index')->with($data);
    }
}