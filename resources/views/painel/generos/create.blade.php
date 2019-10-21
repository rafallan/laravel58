@extends('painel.templatePainel')

@section('pageHeader')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Gêneros </h2>
            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta,
                fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gêneros</li>
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
        <h5 class="card-header">Gêneros</h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            {!! Form::open(['role' => 'form', 'method' => 'POST', 'route' =>
            ['generos.store'], 'files' => true]) !!}

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="nome">Nome do Gênero Dramático</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Gênero"
                        value="{{ old('nome') }}">
                    <small class="text-danger">{!! $errors->first('nome') !!}</small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="descricao">Descrição do Gênero Dramático</label>
                    <input type="text" name="descricao" class="form-control" id="descricao"
                        placeholder="Descrição do Gênero" value="{{ old('descricao') }}">
                    <small class="text-danger">{!! $errors->first('descricao') !!}</small>
                </div>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection