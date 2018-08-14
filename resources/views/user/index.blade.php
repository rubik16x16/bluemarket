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
		<div id="index-app">
			<productos :productos="{{ $productos }}" :routes="{{ $routes }}"></productos>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/user/index.js') }}"></script>

@endsection
