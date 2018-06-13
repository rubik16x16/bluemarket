@extends('user.template')

@section('content')

<div class="row">

	<div class="col-3">
		<h2>Categorias</h2>
		<ul>
			<li>Categoria1</li>
			<li>Categoria2</li>
		</ul>
	</div>

	<div class="col-9">
		<div class="products">

      <h2>Crear Producto</h2>

      <form action="{{ route('user.productos.store') }}" method="post">
        {{ csrf_field() }}

        <input type="text" name="nombre" value="" placeholder="nombre">
				<input type="hidden" name="usuario_id" value="{{ session('usuario.id') }}">
        <input type="text" name="cantidad" value="" placeholder="cantidad">
        <input type="text" name="precio" value="" placeholder="precio">
        <input type="submit" value="guardar">

      </form>

		</div>
	</div>
</div>

@endsection
