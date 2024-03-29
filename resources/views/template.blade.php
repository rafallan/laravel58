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

	<link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

	<style>
		a{
			color: red;
		}
	</style>
</head>

<body>

	<header>
	@include('menuSite')
	</header>

	<div class="container">
		@yield('conteudo')

	</div>

	<footer class="footer mt-auto py-3">
    	<div class="container">
        	<span class="text-muted">&copy; Minicurso de Laravel 5.8 - Todos os direitos reservados.</span>
      	</div>
    </footer>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('bootstrap/js/jquery-3.3.1.slim.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- <script src="fontawesome/js/fontawesome.min.js"></script> -->
</body>

</html>