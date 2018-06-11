<h2>{{ session('usuario.email') }}</h2>
<ul>
	<li>Mi Cuenta</li>
	<li><a href="#">Productos</a></li>
	<li><a href="#">Compras</a></li>
	<li><a href="#">Ventas</a></li>
	<li><a href="{{ route('user.logout') }}">Logout</a></li>
</ul>
