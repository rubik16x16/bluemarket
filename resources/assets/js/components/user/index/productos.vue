<template lang="html">
  <div class="row">
    <div v-for="(producto, index) in productos" class="col-3 card-item">
      <span>nombre: @{{ producto.nombre }}</span>
      <span>precio: @{{ producto.precio }}</span>
      <slider :imgs="producto.imagenes" :route="routes.img"></slider>
      <a class="btn btn-primary" :href="routes.show.replace('id', producto.id)">Ver</a>
    </div>
  </div>
</template>

<script>

Vue.component('slider', require('../../slider/slider.vue'));

export default {
  props: ['productos', 'routes']
}
</script>

<style lang="css">
</style>
