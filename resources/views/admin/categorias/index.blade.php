@extends('admin.template')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th>nombre</th>
      <th>acciones</th>
    </tr>
  </thead>
  @foreach($categorias as $categoria)
    <tr>
      <td>{{ $categoria->nombre }}</td>
      <td>
        <a href="{{ route('admin.categorias.edit', ['id'=> $categoria->id]) }}" class="btn btn-warning">editar</a>
        <a href="#" class="btn btn-danger">eliminar</a>
      </td>
    </tr>
  @endforeach
</table>

<a href="{{ route('admin.categorias.create') }}" class="btn btn-success">Agregar</a>

@endsection
