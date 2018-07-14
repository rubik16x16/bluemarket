@extends('admin.template')

@section('content')

<form action="{{ route('admin.categorias.update', ['id' => $categoria->id]) }}" method="post">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre" value="{{ $categoria->nombre }}">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
