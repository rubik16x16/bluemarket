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

      <form action="{{ route('user.productos.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="text" name="nombre" value="" placeholder="nombre" required>
        <input type="text" name="existencia" value="" placeholder="existencia" required>
        <input type="text" name="precio" value="" placeholder="precio" required>

				<div id= "imgs"></div>

        <input type="submit" value="guardar">

      </form>

		</div>
	</div>
</div>

@endsection

@section('scripts')

<script>

const imgs= new Vue({

	el: '#imgs',
	template: `
		@verbatim
		<div class="img-panel">
			<input v-for="n in inputs" type="file" :name="'img-' + n" value="">
			<button type="button" name="button" @click="inputs+= 1">Agregar imagen</button>
		</div>
		@endverbatim
	`,
	data: {

		inputs: 1

	}

});



</script>

@endsection
