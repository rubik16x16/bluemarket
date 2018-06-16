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

    <h2>{{ $producto->nombre }}</h2>

		<div id="visor-imgs">
			<div class="row">
				<div class="col-3">
					<img v-for="(img, index) in imgs" :src="imgRoute(img)" @click="imgFocus= index" alt="" height="120"/>
				</div>
				<div class="col-9">
					<img :src="imgRoute(imgs[imgFocus])" alt="" height="360" />
				</div>
			</div>
		</div>

	</div>
</div>

@endsection

@section('scripts')

<script>

	const visorImgs= new Vue({

		el: '#visor-imgs',
		data: {
			imgs: @json($producto->imagenes),
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
