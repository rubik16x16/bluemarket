<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>
		BlueMarket
	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/app.css') }}">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
					<form class="form-inline my-2 my-lg-0">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			    </form>
	      </li>
	    </ul>
			@if(session()->has('usuario'))
				@include('user.includes.auth')
			@else
				@include('user.includes.guest')
			@endif
	  </div>
	</nav>

	<div class="container">
		@yield('content')
	</div>

	</div>

	<footer>
		<div class="container">

			footer

		</div>
	</footer>

	@section('scripts')

	<script src="{{ asset('dist/js/app.js') }}"></script>

	@show

</body>
</html>
