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

      <h2>Editar Producto: {{ $producto->nombre }}</h2>

      <form action="{{ route('user.productos.update', ['id' => $producto->id]) }}" method="post">
        @method('PUT')
        {{ csrf_field() }}
        <input type="text" name="nombre" value="{{ $producto->nombre }}" placeholder="nombre">
        <input type="text" name="cantidad" value="{{ $producto->cantidad }}" placeholder="cantidad">
        <input type="text" name="precio" value="{{ $producto->precio }}" placeholder="precio">
        <input type="submit" value="guardar">
      </form>

		</div>
	</div>
</div>

@endsection
