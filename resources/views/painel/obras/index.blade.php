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
                        <li class="breadcrumb-item"><a href="{{ url('painel/dashboard') }}"
                                class="breadcrumb-link">Dashboard</a></li>
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
        <h5 class="card-header">Obras
            <a href="{{ route('obras.create') }}" class="btn btn-success btn-xs float-right"><span
                    class="fa fa-plus"></span></a>
        </h5>
        @if(Session::has('mensagem'))
        <div class="col-sm-12 p-2">
            {!! Session::get('mensagem') !!}
        </div>
        @endif
        <div class="card-body">
            @if($obras->links())
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $obras->links() }}
                </ul>
            </nav>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Título</th>
                            <th scope="col" class="text-center">Categoria</th>
                            <th scope="col" class="text-center">Ano de Lançamento</th>
                            <th scope="col" class="text-center">Gêneros</th>
                            <th scope="col" class="text-center">Imagem</th>
                            <th scope="col" class="text-center" colspan="2" width="10%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($obras)
                        @foreach($obras as $obra)
                        <tr>
                            <td>{{ $obra->titulo }}</td>
                            <td>{{ $obra->categoria->nome }}</td>
                            <td>{{ $obra->ano }}</td>
                            <td>
                                @if($obra->generos)
                                @foreach ($obra->generos as $genero)
                                <ul>
                                    <li>{{ $genero->nome }}</li>
                                </ul>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('storage/obras/'. $obra->imagem) }}" alt="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('obras.edit', $obra) }}" class="btn btn-xs btn-primary"
                                    title="Editar"><span class="fa fa-edit"></span></a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('obras.destroy', $obra) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" value="Excluir" class="btn btn-danger btn-xs"
                                        onclick="return confirm('Você deseja excluir a obra?')">
                                        <i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Nenhuma obra cadastrada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <hr>
                @if($obras->links())
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $obras->links() }}
                    </ul>
                </nav>

                @endif
            </div>
        </div>
    </div>
</div>


@endsection