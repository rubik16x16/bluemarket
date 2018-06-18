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
			<h2>Mis Ventas</h2>

      <div class="row">
        @foreach($ventas as $venta)
        <div class="col-3">
          <span>producto: {{ $venta->producto->nombre }}</span>
          <span>precio: {{ $venta->producto->precio }}</span>
          <span>cantidad: {{ $venta->cantidad }}</span>
          <span>total: {{ $venta->total }}</span>
        </div>
        @endforeach
      </div>

	</div>
</div>

@endsection

@section('scripts')

<script>


</script>

@endsection
