<template lang="html">
  <div class='slider'>
    <img :src="srcImgFocus" alt="">
    <button @click="prev">prev</button>
    <button @click="next">next</button>
  </div>
</template>

<script>

import sliderMethods from './slider-methods';

export default {
  mixins: [sliderMethods],
  props: ['imgs', 'route'],
  data: function(){
    return {
      imgFocus: 0,
    }
  }
}
</script>

<style lang="css">

  .slider{
    width: 200px;
  }

  .slider img{
    width: 100%;
  }

</style>
