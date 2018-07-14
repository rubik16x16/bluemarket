@extends('admin.template')

@section('content')

<form action="{{ route('admin.categorias.store') }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="nombre">nombre</label>
    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre">
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
