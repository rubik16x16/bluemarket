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

    <h2>Producto {{ $producto->name }}</h2>

		<span>nombre: {{ $producto->nombre }}</span>
		<span>cantidad: {{ $producto->cantidad }}</span>
		<span>precio: {{ $producto->precio }}</span>
		<span>estado: {{ $producto->estado }}</span>

		<h2>Descripcion</h2>

		<p>{{ $producto->descripcion }}</p>

		<h2>imagenes</h2>

		@foreach($producto->imagenes as $imagen)
			<img src="{{ asset('storage/' . $imagen->src) }}" alt="" width="200">
		@endforeach

	</div>
</div>

@endsection
