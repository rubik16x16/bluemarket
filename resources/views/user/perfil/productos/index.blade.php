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

		<h2>Mis Productos</h2>

		<div id="productos"></div>

		<a href="{{ route('user.productos.create') }}">nuevo</a>

	</div>
</div>

@endsection

@section('scripts')

<script>

Vue.component('lista-productos', {

	props: ['productos'],
	data: function(){

		return {
			route: "{{ route('user.productos.index') }}"
		}
	},
	template: `
	@verbatim
	<div class="row">
		<div v-for="(producto, index) in productos" class="col-3 card-item">
			<span>nombre: {{ producto.nombre }}</span>
			<span>precio: {{ producto.precio }}</span>
			<img src="#" alt="imagen" width="200" height="200">
			<a :href="route + '/' + producto.id">Ver	</a>
			<a :href="route + '/' + producto.id + '/edit'">Editar</a>
			<a href="#" @click.prevent=" del(index, producto.id) ">del</a>
		</div>
	</div>
	@endverbatim
	`,
	methods:{

		del: function(index, id){

			this.productos.splice(index, 1);

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

const productos = new Vue({

	el: "#productos",
	template: `
		<lista-productos v-bind:productos="productos"></lista-productos>
	`,
	data: {
		productos: @json($productos)
	}

});

</script>

@endsection
