@extends('template')

@section('conteudo')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb text-light bg-dark">
        <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Início</a></li>
    </ol>
</nav>

<h3>Animes</h3>
<div class="row">
    @foreach ($animes as $anime)
    <div class="col-6 col-sm-4 col-md-2">
        <a href="{{ route('obra', ['id' => $anime->id, 'titulo' => Str::slug($anime->titulo)]) }}">
            <img src="{{ asset('storage/obras/'. $anime->imagem) }}" alt="{{ $anime->titulo }}" title="{{ $anime->titulo }}"
                class="img-fluid my-2">
        </a>
    </div>
    @endforeach
</div>

<h3>Filmes</h3>
<div class="row">
    @foreach ($filmes as $filme)
    <div class="col-6 col-sm-4 col-md-2">
        <a href="{{ route('obra', ['id' => $filme->id, 'titulo' => Str::slug($filme->titulo)]) }}">
        <img src="{{ asset('storage/obras/'. $filme->imagem) }}" alt="{{ $filme->titulo }}" title="{{ $filme->titulo }}"
            class="img-fluid my-2">
        </a>
    </div>
    @endforeach
</div>

<h3>Séries</h3>
<div class="row">
    @foreach ($series as $serie)
    <div class="col-6 col-sm-4 col-md-2">
        <a href="{{ route('obra', ['id' => $serie->id, 'titulo' => Str::slug($serie->titulo)]) }}">
            <img src="{{ asset('storage/obras/'. $serie->imagem) }}" alt="{{ $serie->titulo }}" title="{{ $serie->titulo }}"
                class="img-fluid my-2">
        </a>
    </div>
    @endforeach
</div>



@endsection