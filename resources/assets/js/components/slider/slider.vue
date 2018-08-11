<template lang="html">
  <div class='slider'>
    <img :src="srcImgFocus" alt="">
    <button @click="prev">prev</button>
    <button @click="next">next</button>
  </div>
</template>

<script>
export default {
  props: ['imgs', 'route'],
  data: function(){
    return {
      imgFocus: 0,
    }
  },
  computed: {
    srcImgFocus: function(){
      return this.route + '/' + this.imgs[this.imgFocus].src;
    }
  },
  methods: {
    next: function(){
      if(this.imgFocus >= this.imgs.length -1){
        return this.imgFocus=0;
      }
      return this.imgFocus++;
    },
    prev: function(){
      if(this.imgFocus <= 0){
        return this.imgFocus= this.imgs.length -1;
      }
      return this.imgFocus--;
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
