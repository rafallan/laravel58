<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObrasRequest;
use App\Models\Categoria;
use App\Models\Genero;
use App\Models\Obra;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obras = Obra::orderBy('titulo')->paginate();

        return view('painel.obras.index')->with(['obras' => $obras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::orderBy('nome')->get();

        $categorias =  Categoria::orderBy('nome')->get();

        return view('painel.obras.create')->with(['categorias' => $categorias, 'generos' => $generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObrasRequest $request)
    {

        $generos = $request->generos;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $imagem = Image::make($request->file('imagem')->getRealPath());
            $imagem = $imagem->resize(200, 200);
            $nome = kebab_case($request->titulo);
            $extensao = $request->file('imagem')->getClientOriginalExtension();
            $imgNome = "{$nome}.{$extensao}";
            $upload = $imagem->save('storage/obras/' . $imgNome);

            //$upload = $request->imagem->storeAs('obras', $imgRedimensionada);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('mensagem', 'Falha ao fazer o upload da imagem');
            }
        }

        $attributes = [
            'categoria_id' => $request->categoria_id,
            'titulo' => $request->titulo,
            'ano' => $request->ano,
            'sinopse' => $request->sinopse,
            'imagem' => $imgNome,
        ];

        $cadastrado = Obra::create($attributes);

        if ($cadastrado) {

            if ($generos) {
                $cadastrado->generos()->sync($generos);
            }

            return redirect()->route('obras.index')
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
        $obra = Obra::find($id);

        $categorias = Categoria::orderBy('nome')->get();

        $generos = Genero::orderBy('nome')->get();

        $data = [
            'obra' => $obra,
            'categorias' => $categorias,
            'generos' => $generos,
        ];

        return view('painel.obras.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObrasRequest $request, $id)
    {
        $generos = $request->generos;

        $obra = Obra::find($id);

        $attributes = [
            'categoria_id' => $request->categoria_id,
            'titulo' => $request->titulo,
            'ano' => $request->ano,
            'sinopse' => $request->sinopse,
        ];

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $imagem = Image::make($request->file('imagem')->getRealPath());
            $imagem = $imagem->resize(200, 200);
            $nome = kebab_case($request->titulo);
            $extensao = $request->file('imagem')->getClientOriginalExtension();
            $imgNome = "{$nome}.{$extensao}";
            $upload = $imagem->save('storage/obras/' . $imgNome);

            //$upload = $request->imagem->storeAs('obras', $imgRedimensionada);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('mensagem', 'Falha ao fazer o upload da imagem');
            }

            $attributes = array_merge($attributes, array('imagem' => $imgNome));
        }

        $atualizado = Obra::where('id', $id)->update($attributes);

        if ($atualizado) {

            if ($generos) {
                $obra->generos()->sync($generos);
            } else {
                $obra->generos()->detach($generos);
            }

            return redirect()->route('obras.index')
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
        $obra = Obra::find($id);

        $deletado = $obra->delete();

        if ($deletado) {
            Storage::delete('storage/obras/'. $obra->imagem);
            return redirect()->back()->with('mensagem', '<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Cadastro excluído com sucesso!!</div>');
        } else {
            return redirect()->back()->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Erro ao excluir!!</div>');
        }
    }
}
