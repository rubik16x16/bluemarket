<template lang="html">
  <div class="row big-slider">
    <div class="col-3 thunbnails">
      <div class="thumbnail" v-for="(img, index) in imgs">
        <img :src="path + '/' + img.src" alt="" @click="setFocus(index)">
      </div>
    </div>
    <div class="col-9 big-img">
      <div class="slider-wrapper">
        <slider :path="path" :imgs="imgs" :focus="focus" :slice="slice"></slider>
      </div>
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

  .thumbnail{
    height: 120px;
    width: 100%;
    position: relative;
    background: black;
    margin-top: 10px;
    overflow: hidden;
  }

  .thumbnail img{
    max-width: 100%;
    max-height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .slider-wrapper{
    height: 360px;
  }

</style>
