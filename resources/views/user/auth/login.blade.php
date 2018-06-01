@extends('user.template')

@section('content')

<div class="box1">

	<form class="form-test" action="{{ route('user.login.post') }}" method="post">
		{{ csrf_field() }}
		<input type="email" name="email" placeholder="email" @isset($error['email'])
			value="{{ $error['email'] }}"
		@endisset required>
		@isset($error)
			<span>{{ $error['error'] }}</span>
		@endisset
		<input type="password" name="clave" placeholder="clave"  @isset($error['clave'])
			value="{{ $error['clave'] }}"
		@endisset required>
		<input type="submit" name="enviar" value="enviar">
	</form>

</div>

@endsection