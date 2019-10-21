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
                        <li class="breadcrumb-item"><a href="{{ url('painel/dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
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
        <h5 class="card-header">Gêneros
            <a href="{{ route('generos.create') }}" class="btn btn-success btn-xs float-right"><span
                    class="fa fa-plus"></span></a>
        </h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            @if($generos->links())
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $generos->links() }}
                </ul>
            </nav>
            @endif
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col" colspan="2" class="text-center" width="10%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($generos)
                        @foreach($generos as $genero)
                        <tr>
                            <td>{{ $genero->id }}</td>
                            <td>{{ $genero->nome }}</td>
                            <td>{{ $genero->descricao }}</td>
                            <td class="text-center">
                                <a href="{{ route('generos.edit', $genero) }}" class="btn btn-xs btn-primary"
                                    title="Editar"><span class="fa fa-edit"></span></a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('generos.destroy', $genero) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" value="Excluir" class="btn btn-danger btn-xs"
                                        onclick="return confirm('Você deseja excluir a genero?')">
                                        <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Nenhuma gênero cadastrado</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <hr>
                @if($generos->links())
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $generos->links() }}
                    </ul>
                </nav>

                @endif
            </div>
        </div>
    </div>
</div>


@endsection