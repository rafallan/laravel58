<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Obra;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    public function index($id, $genero){

        $genero = Genero::find($id);

        return view('obras-genero')->with(['genero' => $genero]);

        


    }
}
