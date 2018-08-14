<template lang="html">
  <div class="row big-slider">
    <div class="col-3 thunbnails">
      <img v-for="(img, index) in imgs" :src="route + '/' + img.src" @click="imgFocus= index" alt="">
    </div>
    <div class="col-9 big-img">
      <img :src="srcImgFocus" alt="">
      <button @click="prev">prev</button>
      <button @click="next">next</button>
    </div>
  </div>
</template>

<script>

import sliderMethods from './slider-methods';

export default {
  mixins: [sliderMethods],
  props: ['imgs', 'route'],
  data(){
    return {
      imgFocus: 0
    }
  }
}
</script>

<style lang="css">

  .thunbnails img{
    height: 120px;
  }

  .big-img img{
    height: 360px;
  }

</style>
