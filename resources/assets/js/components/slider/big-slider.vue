<template lang="html">
  <div class="row big-slider">
    <div class="col-3 thunbnails">
      <img v-for="(img, index) in imgs" :src="path + '/' + img.src" alt="" @click="setFocus(index)">
    </div>
    <div class="col-9 big-img">
      <slider :path="path" :imgs="imgs" :focus="focus" :slice="slice"></slider>
    </div>
  </div>
</template>

<script>

Vue.component('slider', require('./slider'))

export default {
  props: ['imgs', 'path'],
  data(){
    return {
      focus: 0,
      slice: true
    }
  },
  methods:{
    setFocus(index){
      this.focus= index;
      this.slice= !this.slice;
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
