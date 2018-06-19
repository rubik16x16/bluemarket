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

		<div id="visor-imgs">

			<h2>@{{ producto.nombre }}</h2>

			<div class="row">
				<div class="col-3">
					<img v-for="(img, index) in producto.imagenes" :src="imgRoute(img)" @click="imgFocus= index" alt="" height="120"/>
				</div>
				<div class="col-9">
					<img :src="imgRoute(producto.imagenes[imgFocus])" alt="" height="360" />
				</div>
			</div>

			<span>stock: @{{ producto.existencia }}</span>
			<span>precio: @{{ producto.precio }}</span>
			<span>vendedor: @{{ producto.usuario.email }}</span>
			<span>descripcion: @{{ producto.descripcion }}</span>

			<form id="compra" action="{{ route('user.compras.post') }}" @keypress.enter.prevent="comprar" method="post">
				{{ csrf_field() }}

				<input type="hidden" name="producto" :value="producto.id">
				<label for="cantidad">cantidad</label>
				<input type="number" v-model="compra.cantidad" name="cantidad" id="cantidad">
				<button type="button" @click="comprar" name="comprar">comprar</button>

			</form>

		</div>

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
			imgFocus: 0,
			compra: {
				cantidad: 1
			}
		},
		methods: {
			imgRoute: function(img){
				return this.route + '/' + img.src;
			},
			comprar: function(){

				var frmCompra= document.getElementById('compra');

				if(this.compra.cantidad > this.producto.cantidad && this.compra.cantidad != 0){

					return alert('no hay stock suficiente');

				}

				var url= frmCompra.getAttribute('action');

				// axios({
				// 	method: 'post',
				// 	url: url,
				// 	headers: {
				// 		'X-CSRF-TOKEN': '{{ csrf_token() }}'
				// 	}
				// }).then(response => { console.log(response) }).catch(e => { console.log(e); });

				return frmCompra.submit();

				// frmCompra.submit();

			}
		}

	});

</script>

@endsection
