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

		<div id="productos-app">
			<edit-form :producto="{{ $producto }}" :routes="{{ $routes }}"></edit-form>
		</div>

	</div>
</div>

@endsection

@section('scripts')

	<script src="{{ asset('dist/js/user/productos.js') }}"></script>

@endsection
