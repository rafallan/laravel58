<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
			<a class="navbar-brand" href="#">
				<img src="{{ asset('img/logomark.min.svg') }}" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('inicio') }}">Início <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('filmes.index') }}">Filmes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('series.index') }}">Séries</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gêneros
						</a>
						@php 
							$generos = App\Models\Genero::orderBy('nome')->get();
						@endphp
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							@foreach($generos as $genero)
							<a class="dropdown-item" href="{{ route('obras-genero', ['id' => $genero->id, 'nome' => Str::slug($genero->nome)]) }}">{{ $genero->nome }}</a>
							@endforeach
						</div>
					</li>

				</ul>
				<form class="form-inline my-2 my-lg-0 mr-3">
					<input class="form-control mr-sm-0" type="search" placeholder="Procurar..." aria-label="Search">
					<button class="btn btn-danger my-2 my-sm-2" type="submit"><i class="fa fa-search"></i></button>
				</form>
				<ul class="navbar-nav mr-5">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-danger" href="#" id="navbarUser" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-2x fa-user"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarUser">
							<a class="dropdown-item" href="{{ route('login') }}">Login</a>

						</div>
					</li>
				</ul>
			</div>
		</nav>