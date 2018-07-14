<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AdminLogin</title>
</head>
<body>
  <form action="{{ route('admin.login.post') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="email" placeholder="email">
    @if(session()->has('error'))
			<span>{{ session('error') }}</span>
		@endif
    <input type="password" name="clave" placeholder="clave">
    <button type="submit" name="button">ingresar</button>
  </form>
</body>
</html>
