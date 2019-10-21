<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){

        $series = Obra::where('categoria_id', 3)->orderBy('titulo')->get();

        $data = [
            'series' => $series,
        ];

        return view('series')->with($data);
    }
}
