@extends('user.template')

@section('content')

<div class="row">

	<div class="col-3">
		<span>Categorias</span>
		<ul class="nav flex-column">
			@foreach($categorias as $categoria)
			<li class="nav-item">
				<a class="nav-link active" href="#">{{ $categoria->nombre }}</a>
			</li>
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
