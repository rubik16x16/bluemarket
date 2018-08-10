<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>
		BlueMarket
	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/app.css') }}">
</head>
<body>

		<nav class="nav-header">
			<div class="container">
				<ul class="nav-header-menu">
					<li><a href="{{ route('user.index') }}"><h1>Bluemarket</h1></a></li>
					<li>
						<input type="text" name="buscar" placeholder="buscar">
						<button >Buscar</button>
					</li>
					<li>
						@if(session()->has('usuario'))

							@include('user.includes.auth')

						@else

							@include('user.includes.guest')

						@endif
					</li>
				</ul>
				<div class="clear"></div>
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

	<script src="{{ asset('js/vue.js') }}"></script>
	@yield('scripts')

</body>
</html>
