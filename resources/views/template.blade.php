<!doctype html>
<html lang="pt-br">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<!--Fontawesome -->
	<link rel="stylesheet" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">

	<title>Curso de Laravel </title>
	<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
						<a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Filmes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Séries</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Gêneros
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Ação</a>
							<a class="dropdown-item" href="#">Aventura</a>
							<a class="dropdown-item" href="#">Comédia</a>
							<a class="dropdown-item" href="#">Drama</a>
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
	</header>

	<div class="container">
		@yield('conteudo')

	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- <script src="fontawesome/js/fontawesome.min.js"></script> -->
</body>

</html>