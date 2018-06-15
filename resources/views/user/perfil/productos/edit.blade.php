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

      <form action="{{ route('user.productos.update', ['id' => $producto->id]) }}" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @method('PUT')
        {{ csrf_field() }}
        <input type="text" name="nombre" value="{{ $producto->nombre }}" placeholder="nombre">
        <input type="text" name="cantidad" value="{{ $producto->cantidad }}" placeholder="cantidad">
        <input type="text" name="precio" value="{{ $producto->precio }}" placeholder="precio">

				<h2>imagenes</h2>

				<div id="imgs"></div>

				<input type="submit" value="guardar">

			</form>

		</div>
	</div>
</div>

@endsection

@section('scripts')

	<script>

	Vue.component('imgs-add',{

		template: `
			@verbatim
			<div class="img-panel">
				<input v-for="n in inputs" type="file" :name="'img-' + n" value="">
				<button type="button" name="button" @click="inputs+= 1">Agregar imagen</button>
			</div>
			@endverbatim
		`,
		data: function(){

			return {
				inputs: 0
			}

		}

	});

	const imgs= new Vue({
		el: '#imgs',
		data: {
			imgs: @json($producto->imagenes),
			path: "{{ asset('storage') }}" + "/",
			route: "{{ route('user.imagenes.destroy', ['id'=> null]) }}"
		},
		template: `
			<div>
				<div class="imgs-box" v-for="(img, index) in imgs">
					<img  :src="path + img.src" alt="" width="200">
					<button @click="imgDel(index, img.id)" type="button">borrar</button>
				</div>
				<imgs-add></imgs-add>
			</div>
		`,
		methods: {
			imgDel: function(index, id){

				this.imgs.splice(index, 1);

				if (window.XMLHttpRequest) { // Mozilla, Safari, ...

					var xhttp = new XMLHttpRequest();

				} else if (window.ActiveXObject) { // IE

					var xhttp = new ActiveXObject("Microsoft.XMLHTTP");

				}

				xhttp.onreadystatechange = function() {

					 if (this.readyState == 4) {

							// alert(this.responseText);

					 }

				};

				xhttp.open("DELETE", this.route + '/' + id, true);
				xhttp.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
				xhttp.send();

			}
		}
	});

	</script>

@endsection
