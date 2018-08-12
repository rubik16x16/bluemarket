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

    <h2>Crear Producto</h2>

		<div id="productos-app">

			<form action="{{ route('user.productos.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

			  <div class="form-group">
			    <label for="nombre">Nombre</label>
			    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
			  </div>

				<div class="form-group">
			    <label for="existencia">Existencia</label>
			    <input type="text" name="existencia" class="form-control" id="existencia" placeholder="Existencia">
			  </div>

				<div class="form-group">
			    <label for="precio">Precio</label>
			    <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio">
			  </div>

				<div class="form-group">
			    <label for="descripcion">Descripcion</label>
			    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion"></textarea>
			  </div>

				<imgs-add></imgs-add>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>

	</div>
</div>

@endsection

@section('scripts')

	<script src="{{ asset('dist/js/user/productos.js') }}"></script>

@endsection
