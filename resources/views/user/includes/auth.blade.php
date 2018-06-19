<h2>{{ session('usuario.email') }}</h2>
<ul>
	<li>Mi Cuenta</li>
	<li><a href="{{ route('user.productos.index') }}">Productos</a></li>
	<li><a href="{{ route('user.compras.index') }}">Compras</a></li>
	<li><a href="{{ route('user.ventas.index') }}">Ventas</a></li>
	<li><a href="{{ route('user.logout') }}">Logout</a></li>
</ul>
