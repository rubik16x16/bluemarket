@extends('admin.template')

@section('content')

  <h2>Usuarios</h2>

  <table class="table">
    <thead>
      <th>Comentario</th>
      <th>Respuesta</th>
      <th>Producto</th>
      <th>Fecha</th>
    </thead>
    @foreach($comentarios as $comentario)
    <tbody>
      <tr>
        <td>{{ $comentario->comentario }}</td>
        <td>{{ $comentario->respuesta }}</td>
        <td><a href="{{ route('user.public.producto.show', ['id' => $comentario->producto->id]) }}">{{ $comentario->producto->nombre }}</a></td>
        <td>{{ $comentario->created_at }}</td>
      </tr>
    </tbody>
    @endforeach
  </table>

@endsection
