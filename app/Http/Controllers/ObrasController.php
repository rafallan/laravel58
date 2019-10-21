<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObrasController extends Controller
{
    public function index($id, $titulo){

        $obra = Obra::find($id);

        return view('obra')->with(['obra' => $obra]);

    }
}
