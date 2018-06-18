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
			<h2>Mis Compras</h2>

      <div class="row">

        <div class="col-3">
          <span>producto: {{ $compra->producto->nombre }}</span>
          <span>precio: {{ $compra->producto->precio }}</span>
          <span>cantidad: {{ $compra->cantidad }}</span>
          <span>total: {{ $compra->total }}</span>

          <span>vendedor: {{ $compra->comprador->email }}</span>

        </div>

      </div>

	</div>
</div>

@endsection

@section('scripts')

<script>


</script>

@endsection
