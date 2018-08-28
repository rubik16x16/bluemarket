<template lang="html">
  <div class="show-view">
    <big-slider :imgs="producto.imagenes" :path="[routes.imgPath + '/productos/imgs/', routes.imgPath + '/productos/imgs/sm/']"></big-slider>
    <frm-compra :producto="producto"></frm-compra>
    <comentarios :comentarios="producto.comentarios" :routes="routes.comentarios"></comentarios>
  </div>
</template>

<script>

Vue.component('big-slider', require('../../slider/big-slider'));
Vue.component('frm-compra', require('./frm-compra'));
Vue.component('comentarios', require('./comentarios'));

export default {
  props: ['producto', 'routes']
}
</script>

<style lang="css">
</style>
