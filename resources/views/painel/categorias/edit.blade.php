@extends('painel.templatePainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Categorias </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""
                                class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categorias</li>
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
        <h5 class="card-header">Categorias</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(['role' => 'form', 'method' => 'PUT', 'route' =>
            ['categorias.update', $categoria], 'files' => true]) !!}

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da Categoria"
                        value="{{ $categoria->nome }}">
                    <small class="text-danger">{!! $errors->first('nome') !!}</small>
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