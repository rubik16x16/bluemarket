@extends('user.template')

@section('content')

<div class="box1">

	<form class="form-test" action="{{ route('registro.post') }}" method="post">
		{{ csrf_field() }}
		<input type="email" name="email" placeholder="email" value="{{ session('email', '') }}" required>

		@if(session()->has('error'))

			<span>Usuario ya registrado</span>

		@endif

		<input type="password" name="clave" placeholder="clave" required>
		<input type="submit" name="enviar" value="enviar">
	</form>

</div>

@endsection
