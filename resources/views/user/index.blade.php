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
			<nav aria-label="Page navigation example">
			  <ul class="pagination">
					<li class="page-item"><a class="page-link" href="{{ route('user.index', ['pagina' => 1]) }}">1...</a></li>
					@for($i= $paginado['inicio']; $i <= $paginado['fin']; $i++)
					<li class="page-item"><a class="page-link" href="{{ route('user.index', ['pagina' => $i]) }}">{{ $i }}</a></li>
					@endfor
					<li class="page-item"><a class="page-link" href="{{ route('user.index', ['pagina' => $paginado['paginas']]) }}">...{{ $paginado['paginas'] }}</a></li>
			  </ul>
			</nav>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('dist/js/user/index.js') }}"></script>

@endsection
