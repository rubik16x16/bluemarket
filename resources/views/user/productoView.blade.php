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

		@verbatim
		<div id="visor-imgs">

			<h2>{{ producto.nombre }}</h2>

			<div class="row">
				<div class="col-3">
					<img v-for="(img, index) in producto.imagenes" :src="imgRoute(img)" @click="imgFocus= index" alt="" height="120"/>
				</div>
				<div class="col-9">
					<img :src="imgRoute(producto.imagenes[imgFocus])" alt="" height="360" />
				</div>
			</div>

			<span>stock: {{ producto.cantidad }}</span>
			<span>precio: {{ producto.precio }}</span>
			<span>vendedor: {{ producto.usuario.email }}</span>

		</div>
		@endverbatim

	</div>
</div>

@endsection

@section('scripts')

<script>

	const visorImgs= new Vue({

		el: '#visor-imgs',
		data: {
			producto: @json($producto),
			route: "{{ asset('storage') }}",
			imgFocus: 0
		},
		methods: {
			imgRoute: function(img){
				return this.route + '/' + img.src;
			}
		}

	});

</script>

@endsection
