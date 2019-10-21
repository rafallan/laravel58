@extends('template')

@section('conteudo')

<h3>Obras - {{ $genero->nome }}</h3>
<div class="row">
    @if($genero->obras)
    @foreach ($genero->obras as $obra)
    <div class="col-6 col-sm-4 col-md-2">
    <a href="{{ route('obra', ['id' => $obra->id, 'titulo' => Str::slug($obra->titulo)]) }}">
        <img src="{{ asset('storage/obras/'. $obra->imagem) }}" alt="{{ $obra->titulo }}" title="{{ $obra->titulo }}"
            class="img-fluid my-2">
    </a>
    </div>
    @endforeach
    @endif
</div>

@endsection