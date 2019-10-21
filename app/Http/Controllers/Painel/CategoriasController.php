<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\View\View;
use Validator;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(2);

        return view('painel.categorias.index')->with(['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|unique:categorias,nome',
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório',
            'unique'   => 'Categoria já cadastrada',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = [
                'nome' => $request->input('nome'),
            ];

            $atualizado = Categoria::create($data);

            if ($atualizado) {
                return redirect()->back()->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro realizado com sucesso!!</div>');
            } else {
                return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao cadastrar!!</div>');
            }
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
        $categoria = Categoria::find($id);

        return View('painel.categorias.edit')->with(['categoria' => $categoria]);
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
        $rules = [
            'nome' => 'required|unique:categorias,nome',
        ];

        $messages = [
            'required' => 'Esse campo é obrigatório',
            'unique'   => 'Categoria já cadastrada',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = [
                'nome' => $request->input('nome'),
            ];

            $atualizado = Categoria::where('id', $id)->update($data);

            if ($atualizado) {
                return redirect()->back()->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro atualizado com sucesso!!</div>');
            } else {
                return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao atualizar!!</div>');
            }
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
        $categoria = Categoria::find($id);

        $deletado = $categoria->delete();

        if ($deletado) {
            return redirect()->back()->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro excluído com sucesso!!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao excluir!!</div>');
        }
    }
}
