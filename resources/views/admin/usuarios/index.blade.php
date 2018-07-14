@extends('admin.template')

@section('content')

  <h2>Usuarios</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Acciones</th>
      </tr>
    </thead>
    @foreach($usuarios as $usuario)
    <tr>
      <td>{{ $usuario->email }}</td>
      <td>
        <a href="#" class="btn btn-danger">Desactivar</a>
      </td>
    </tr>
    @endforeach
  </table>

@endsection
