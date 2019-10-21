@extends('template')

@section('conteudo')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-light bg-dark">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $obra->titulo }}</li>
    </ol>
</nav>

<h3 class="text-center">{{ $obra->titulo }}</h3>
<div class="row">
   
    <div class="col-sm-4 col-md-2 text-center">
        <img src="{{ asset('storage/obras/'. $obra->imagem) }}" alt="{{ $obra->titulo }}" title="{{ $obra->titulo }}"
            class="img-fluid my-2">
    </div>

    <div class="col-sm-8 col-md-10">
        <h4></h4>

        <p class="">
            {!! $obra->sinopse !!}
        </p>

        <span> <strong>Gêneros: </strong></span>
        @foreach($obra->generos as $genero)
        <span class="mr-2 btn btn-success">{{ $genero->nome }}</span>
        @endforeach

        <p>Ano de Lançamento: {{ $obra->ano }}</p>
    </div>
    
    
</div>

@endsection