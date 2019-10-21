@extends('painel.templatePainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Obras </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Obras</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

@endsection

@section('conteudo')

<div class="col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Obras</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(['role' => 'form', 'method' => 'PUT', 'route' =>
            ['obras.update', $obra], 'files' => true]) !!}

            @csrf
            <div class="form-group">
                <label for="generos">Gêneros</label>
                <select name="generos[]" id="generos" class="js-example-basic-multiple form-control" multiple>

                    @foreach($generos as $genero)
                    @if($obra->generos->contains($genero)))
                    <option value="{{ $genero->id }}" selected>{{ $genero->nome }}</option>
                    @else
                    <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                    @endif
                    @endforeach
                </select>
                <small class="text-danger form-text">{!! $errors->first('generos') !!}</small>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="form-control">
                    <option value="">Selecione</option>
                    @foreach($categorias as $categoria)
                    @if(($obra->categoria_id == $categoria->id))
                    <option value="{{ $categoria->id }}" selected>{{ $categoria->nome }}</option>
                    @else
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endif
                    @endforeach
                </select>
                <small class="text-danger form-text">{!! $errors->first('categoria_id') !!}</small>


                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="titulo"
                            value="{{ $obra->titulo }}">
                        <small class="text-danger">{!! $errors->first('titulo') !!}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="ano">Ano de Lançamento</label>
                        <input type="number" name="ano" class="form-control" id="ano" placeholder="Ano de lançamento"
                            value="{{ $obra->ano }}">
                        <small class="text-danger">{!! $errors->first('ano') !!}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="sinopse">Sinopse</label>
                        <textarea name="sinopse" id="sinopse" class="form-control ckeditor"
                            placeholder="Sinopse">{{ $obra->sinopse }}</textarea>
                        <small class="text-danger form-text">{!! $errors->first('sinopse') !!}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm">
                        <label for="imagem">Imagem</label>
                        <input type="file" name="imagem" class="form-control" id="imagem" placeholder="Imagem"
                            value="{{ old('imagem') }}">
                        <small class="text-danger">{!! $errors->first('imagem') !!}</small>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">ATUALIZAR</button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @endsection

    @section('js')

    <script>
        $(document).ready(function () {
                $('.js-example-basic-multiple').select2({
                    tokenSeparators: [',', ''],
                    allowClear: true,
                    theme: "classic",
                });
            });
    
    </script>

    @endsection