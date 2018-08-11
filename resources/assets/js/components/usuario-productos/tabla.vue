<template lang="html">
  <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body table-responsive">
    <table class="table productos-table">
      <thead>
        <th>nombre</th>
        <th>existencia</th>
        <th>precio</th>
        <th>estado</th>
        <th>descripcion</th>
        <th>Imgs</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        <tr v-for="(producto, index) in listaProductos">
          <td>{{ producto.nombre }}</td>
          <td>{{ producto.existencia }}</td>
          <td>{{ producto.precio }}</td>
          <td>{{ producto.estado }}</td>
          <td>{{ producto.descripcion }}</td>
          <th><slider class="productos-slider" :imgs="producto.imagenes" :route="routes.imgSrc"></slider></th>
          <td>
            <a class="btn btn-warning" :href="routes.edit.replace('id', producto.id)">Editar</a>
            <a class="btn btn-danger" href="#" @click.prevent="removeProducto(producto.id, index)">Eliminar</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
    <a class="btn btn-primary" :href="routes.create">Nuevo producto</a>
  </div>
</div>
</template>

<script>

import urlAbmMethods from '../mixins/url-abm-methods';

Vue.component('slider', require('../slider/slider'));

export default {
  mixins:[urlAbmMethods],
  props: ['productos', 'routes'],
  data(){
    return {
      listaProductos: null
    }
  },
  mounted(){
    this.listaProductos= this.productos;
  },
  methods:{
    removeProducto(id, index){
      this.destroy(this.routes.destroy.replace('id', id));
      alert(this.listaProductos[index].nombre);
      this.listaProductos.splice(index, 1);
    }
  }
}
</script>

<style lang="css" scoped>

  .productos-slider{
    width: 130px;
  }

  .productos-table td{
    vertical-align: middle;
  }

</style>
