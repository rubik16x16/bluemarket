<template lang="html">
  <div class='slider' @mouseover="show= true" @mouseout="show= false">
    <div class="frame" :style="{left: frameLeft + 'px' }">
      <div class="img-wrapper" v-for="img in imgs">
        <img :src="path + '/' + img.src" alt="">
      </div>
      <div class="clear"></div>
    </div>
    <transition-group name="fade">
      <template v-if="show">
        <button class="slider-btn prev" v-bind:key="1" @click="slide()"><</button>
        <button class="slider-btn next" v-bind:key="2" @click="slide('next')">></button>
      </template>
    </transition-group>
  </div>
</template>

<script>

export default {
  props: ['imgs', 'path', 'focus', 'slice'],
  data: function(){
    return {
      show: false,
      frameLeft: 0,
      width: 0
    }
  },
  watch:{
    slice(){
      this.frameLeft= this.focus != 0 ? (this.focus * this.width) * -1 : 0 ;
    }
  },
  mounted(){

    this.reRender();

    window.addEventListener('resize', this.reRender);

  },
  methods: {
    slide(btn = null){
      var width= this.width;
      var left= this.frameLeft;

      if(btn == 'next'){
        left= Math.abs(left) == (((this.imgs.length - 1) * width)) ? 0 : (left - width);
        return this.frameLeft= left;
      }

      left= left == 0 ? (((this.imgs.length - 1) * width)) * -1 : (left + width);
      return this.frameLeft= left;

    },
    reRender(){
      var slider= this.$el;
      var style= window.getComputedStyle(slider);
      var imgs= this.$el.getElementsByClassName('img-wrapper');
      var width= style.getPropertyValue('width');
      this.width= parseInt(width.substr(0, width.length -2));
      this.frameLeft= 0;

      for(var i= 0; i < imgs.length; i++){
        imgs[i].style.width= width;
      }

      this.$el.getElementsByClassName('frame')[0].style.width= ((imgs.length * this.width) + 3) + 'px';
    }
  }
}
</script>

<style lang="css">

  .slider{
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
  }

  .slider-btn{
    top: 50%;
    cursor: pointer;
    position: absolute;
    border-style: none;
    background-color: yellow;
    transform: translate(0, -50%);
  }

  .prev{
    left: 0;
    background: yellow;
  }

  .next{
    right: 0;
    background: green;
  }

  .frame{
    left: 0px;
    position: relative;
    transition: left .5s ease-out 0s;
    height: 100%;
  }

  .img-wrapper{
    position: relative;
    background: black;
    float: left;
    height: inherit;
  }

  .img-wrapper img{
    max-width: 100%;
    max-height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

  }

  .clear{
    clear: both;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }

</style>
