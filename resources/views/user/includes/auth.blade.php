<div class="dropdown">
	<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		{{ session('usuario.email') }}
	</a>
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="{{ route('user.productos.index') }}">Productos</a>
		<a class="dropdown-item" href="{{ route('user.compras.index') }}">Compras</a>
		<span class="dropdown-item">Ventas</span>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{{ route('user.ventas.index') }}">Ventas</a>
		<a class="dropdown-item" href="{{ route('user.comentarios.index') }}">Preguntas</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="{{ route('user.logout') }}">Salir</a>
	</div>
</div>
