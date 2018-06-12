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
				<ul class="nav-header-menu">
					<li><h1>Bluemarket</h1></li>
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
