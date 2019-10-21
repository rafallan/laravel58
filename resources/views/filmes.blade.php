@extends('template')

@section('conteudo')

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

@endsection