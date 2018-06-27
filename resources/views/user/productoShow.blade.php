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

		<div id="producto"></div>

		@foreach($producto->comentarios as $comentario)

		<span>comentario: {{ $comentario->comentario }}</span>
		<span>respuesta: {{ $comentario->respuesta }}</span>

		@endforeach

	</div>
</div>

@endsection

@section('scripts')

<script>

	Vue.component('producto-imgs',{
		props: ['imgs'],
		data: function(){
			return {
				route: "{{ asset('storage') }}",
				imgFocus: 0
			}
		},
		template: `
			@verbatim
			<div class="row producto-imgs">
				<div class="col-3">
					<img v-for="(img, index) in imgs" :src="imgRoute(img)" @click="imgFocus= index" alt="" height="120"/>
				</div>
				<div class="col-9">
					<img :src="imgRoute(imgs[imgFocus])" alt="" height="360" />
				</div>
			</div>
			@endverbatim`,
		methods: {
			imgRoute: function(img){
				return this.route + '/' + img.src;
			}
		}
	});

	Vue.component('producto-info', {
		props: ['producto'],
		template: `
			@verbatim
			<div class="producto-info">
				<span>stock: {{ producto.existencia }}</span>
				<span>precio: {{ producto.precio }}</span>
				<span>vendedor: {{ producto.usuario.email }}</span>
				<span>descripcion: {{ producto.descripcion }}</span>
			</div>
			@endverbatim`
	});

	Vue.component('producto-frm-compra', {
		props: ['producto'],
		data: function(){
			return {
				route: "{{ route('user.compras.post') }}",
				token: '{{ csrf_field() }}',
				compra: {}
			}
		},
		template:`
			@verbatim
			<form id="producto-frm-compra" :action="route" @keypress.enter.prevent="comprar" method="post">
				<span v-html="token"></span>
				<input type="hidden" name="producto" :value="producto.id">
				<label for="cantidad">cantidad</label>
				<input type="number" v-model="compra.cantidad" name="cantidad" id="cantidad">
				<button type="button" @click="comprar" name="comprar">comprar</button>
			</form>
			@endverbatim`,
		methods: {
			comprar: function(){

				var frmCompra= document.getElementById('producto-frm-compra');
				var url= frmCompra.getAttribute('action');

				if(this.compra.cantidad > this.producto.existencia && this.compra.cantidad != 0){
					return alert('no hay stock suficiente');
				}

				return frmCompra.submit();
			}
		}
	});

	Vue.component('producto-comentarios', {
		props: ['producto'],
		data: function(){
			return {
				url: "{{ route('user.comentarios.store_comentario', ['id' => $producto->id]) }}",
				comentario: ''
			}
		},
		template: `
		@verbatim
		<div class="producto-comentarios">
			<div class="comentarios" v-for="comentario in producto.comentarios">
				<span>{{ comentario.comentario }}</span>
				<span>{{ comentario.respuesta }}</span>
			</div>
			<form>
				<input type="text" name="comentario" placeholder="comentario" v-model="comentario"/>
				<button type="button" @click="comentar">enviar</button>
			</form>
		</div>
		@endverbatim`,
		methods: {
			comentar: function(){
				alert('asd');
				axios({
					method: 'post',
					url: this.url,
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					data: {
						comentario: this.comentario,
					}
				}).then(response => {
					 console.log(response.data);
					 this.producto.comentarios.push(response.data);
				 }).catch(e => {
					 console.log(e);
				 });
			}
		}
	});

	const producto= new Vue({

		el: '#producto',
		data: {
			producto: @json($producto),
			compra: {
				cantidad: 1
			}
		},
		template:`
			@verbatim
			<div class="producto">
				<h2>{{ producto.nombre }}</h2>
				<producto-imgs :imgs="producto.imagenes"></producto-imgs>
				<producto-info :producto="producto"></producto-info>
				<producto-frm-compra :producto="producto"></producto-frm-compra>
				<producto-comentarios :producto="producto"></producto-comentarios>
			</div>
			@endverbatim`
	});

</script>

@endsection
