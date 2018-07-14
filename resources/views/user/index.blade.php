@extends('user.template')

@section('content')

<div class="row">

	<div class="col-3">
		<h2>Categorias</h2>
		<ul>
			@foreach($categorias as $categoria)
				<li>{{ $categoria->nombre }}</li>
			@endforeach
		</ul>
	</div>

	<div class="col-9">

		<div id="productos"></div>

	</div>
</div>

@endsection

@section('scripts')

<script>

	Vue.component('img-slider', {

		props: ['imgs'],
		data: function(){
			return {
				imgRoute: "{{ asset('storage') }}",
				imgFocus: 0,
			}
		},
		template: `
			<div class='img-slider'>
				<img :src="srcImgFocus" alt="" width="200">
				<button @click="prev">prev</button>
				<button @click="next">next</button>
			</div>
		`,
		computed: {
			srcImgFocus: function(){
				return this.imgRoute + '/' + this.imgs[this.imgFocus].src;
			}
		},
		methods: {

			next: function(){

				if(this.imgFocus >= this.imgs.length -1){
					return this.imgFocus=0;
				}
				return this.imgFocus++;

			},
			prev: function(){

				if(this.imgFocus <= 0){
					return this.imgFocus= this.imgs.length -1;
				}
				return this.imgFocus--;

			}

		}
	});

	const productos= new Vue({

		el: "#productos",
		data: {

			productos: @json($productos),
			route: "{{ route('user.public.producto.show', ['id' => null]) }}",

		},
		template: `
			<div class="row">
				<div v-for="(producto, index) in productos" class="col-3 card-item">
					<span>nombre: @{{ producto.nombre }}</span>
					<span>precio: @{{ producto.precio }}</span>
					<img-slider :imgs="producto.imagenes"></img-slider>
					<a :href="route + '/' + producto.id">Ver	</a>
				</div>
			</div>
			`
	});

</script>

@endsection
