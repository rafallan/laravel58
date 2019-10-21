@extends('template')

@section('conteudo')

<h2>Últimas publicações</h2>

<div class="row">

    @foreach ($obras as $obra)
    <div class="col-6 col-sm-4 col-md-2">
        <img src="{{ asset('storage/obras/'. $obra->imagem) }}" alt="{{ $obra->titulo }}" title="{{ $obra->titulo }}"
            class="img-fluid my-2">
    </div>
    @endforeach
</div>



@endsection