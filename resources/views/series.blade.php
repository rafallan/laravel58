@extends('template')

@section('conteudo')

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