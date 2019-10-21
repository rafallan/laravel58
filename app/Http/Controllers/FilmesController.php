<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function index(){

        $filmes = Obra::where('categoria_id', 2)->orderBy('titulo')->get();

        $data = [
            'filmes' => $filmes,
        ];

        return view('filmes')->with($data);
    }
}
