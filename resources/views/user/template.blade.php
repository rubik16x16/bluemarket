<!DOCTYPE html>
<html>
<head>
	<title>
		BlueMarket
	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

		<nav class="nav-header">
			<div class="container">
				<ul>
					<li><h1>Bluemarket</h1></li>
					<li>
						<input type="text" name="buscar" placeholder="buscar">
						<button >Buscar</button>
					</li>
					<li>
						@if(isset($usuario))
						<h2>{{ $usuario->email }}</h2>
						<a href="{{ route('user.logout') }}">Logout</a>
						@else
						<a href="{{ route('user.login.get') }}">ingreso</a>
						<a href="{{ route('registro.get') }}">registro</a>
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

</body>
</html>