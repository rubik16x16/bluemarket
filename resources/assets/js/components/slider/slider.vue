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
  props: ['imgs', 'path'],
  data: function(){
    return {
      imgFocus: 0,
      show: false,
      frameLeft: 0,
      width: 0
    }
  },
  mounted(){
    console.log(3 * 1.23);
    var slider= this.$el;
    var style= window.getComputedStyle(slider);
    var imgs= this.$el.getElementsByClassName('img-wrapper');
    var width= style.getPropertyValue('width');
    this.width= parseInt(width.substr(0, width.length -2));

    for(var i= 0; i < imgs.length; i++){
      imgs[i].style.width= width;
    }

    this.$el.getElementsByClassName('frame')[0].style.width= ((imgs.length * this.width) + 3) + 'px';
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

    }
  }
}
</script>

<style lang="css">

  .slider{
    width: 100%;
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
  }

  .img-wrapper{
    background: black;
    float: left;
    width: 200px;
  }

  .img-wrapper img{
    width: 100%;
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
