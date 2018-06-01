@extends('user.template')

@section('content')

<div class="box1">

	<form class="form-test" action="{{ route('registro.post') }}" method="post">
		{{ csrf_field() }}
		<input type="email" name="email" placeholder="email">
		@isset($email_error)
			<span>Usuario ya registrado</span>
		@endisset
		<input type="password" name="clave" placeholder="clave">
		<input type="submit" name="enviar" value="enviar">
	</form>

</div>

@endsection