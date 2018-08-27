<template lang="html">
  <div class="row">
    <div v-for="(producto, index) in productos" class="col-4">
      <div class="card text-center producto">
        <div class="card-body">
          <div class="slider-wrapper">
            <slider :imgs="producto.imagenes" :path="routes.img + '/productos/imgs/sm/'" :key="producto.id"></slider>
          </div>
        </div>
        <div class="card-footer text-muted">
          <h2 class="nombre"><a :href="routes.show.replace('id', producto.id)">{{ producto.nombre }}</a></h2>
          <h3 class="precio">${{ producto.precio }}</h3>
        </div>
      </div>
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

.producto{
  margin-top: 20px;
  border-radius: 0;
}

.producto .card-body{
  padding: 0;
}

.producto .slider-wrapper{
  height: 160px;
}

.producto .card-footer{
  padding: 0;
}

.producto .nombre a{
  font-size: 20px;
  text-decoration: none;
  color: black;
}

.producto .precio{
  font-size: 18px;
  text-decoration: none;
  color: black;
}

</style>
