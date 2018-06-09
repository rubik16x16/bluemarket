@extends('user.template')

@section('content')

<div class="box1">

	<form class="form-test" action="{{ route('user.login.post') }}" method="post">
		{{ csrf_field() }}
		<input type="email" name="email" placeholder="email" value="{{ session('email', '') }}" required>

		@if(session()->has('error'))

			<span>{{ session('error') }}</span>
			
		@endif

		<input type="password" name="clave" placeholder="clave" value="{{ session('clave', '') }}" required>
		<input type="submit" name="enviar" value="enviar">
	</form>

</div>

@endsection
