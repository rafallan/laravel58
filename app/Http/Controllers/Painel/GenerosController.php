<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GenerosRequest;
use App\Models\Genero;
use Illuminate\View\View;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::orderBy('nome')->paginate();

        return View('painel.generos.index')->with(['generos' => $generos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.generos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenerosRequest $request)
    {
        // // $attributes = [
        // //     'nome' => $request->nome,
        // //     'descricao' => $request->descricao,
        // // ];

        // $cadastrado = Genero::create($attributes);

        $cadastrado = Genero::create($request->all());

        if ($cadastrado) {
            return redirect()->route('generos.index')
                ->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro realizado com sucesso!!</div>');
        } else {
            return redirect()->back()
                ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao cadastrar!!</div>');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::find($id);

        return View('painel.generos.edit')->with(['genero' => $genero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ];

        $atualizado = Genero::where('id', $id)->update($attributes);

        if ($atualizado) {
            return redirect()->route('generos.index')
                ->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro atualizado com sucesso!!</div>');
        } else {
            return redirect()->back()
                ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao atualizar!!</div>');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
