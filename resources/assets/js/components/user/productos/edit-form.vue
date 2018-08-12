<template lang="html">
  <div class="edit-form">
    <h2>Editar Producto: {{ producto.nombre }}</h2>

    <form :action="routes.update" method="post" enctype="multipart/form-data">

      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" :value="csrfToken">

      <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" :value="producto.nombre" required>
      </div>

      <div class="form-group">
        <label for="existencia">Existencia</label>
        <input type="text" name="existencia" class="form-control" id="existencia" placeholder="Existencia" :value="producto.existencia" required>
      </div>

      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio" :value="producto.precio" required>
      </div>

      <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" required>{{ producto.descripcion }}</textarea>
      </div>

      <imgs-panel :imgs="producto.imagenes" :routes="routes.imgs"></imgs-panel>
      <imgs-add></imgs-add>

      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>
</template>

<script>
export default {
  props: ['producto', 'routes'],
  computed:{
    csrfToken(){
      let token = document.head.querySelector('meta[name="csrf-token"]');

      if(token){
          return  token.content;
      }else{
        return console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
      }
    }
  }
}
</script>

<style lang="css">
</style>
