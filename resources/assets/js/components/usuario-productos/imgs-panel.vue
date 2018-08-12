<template lang="html">
  <div class="imgs-panel">
    <div class="row">
      <div class="col-3 img-box" v-for="(img, index) in listImgs">
        <img class="rounded" :src="routes.path + '/' + img.src" alt="">
        <button class="btn btn-block btn-danger" @click="removeImg(img.id, index)" type="button">borrar</button>
      </div>
    </div>
  </div>
</template>

<script>

import urlAbmMethods from '../mixins/url-abm-methods';

export default {
  mixins: [urlAbmMethods],
  props: ['imgs', 'routes'],
  data(){
    return {
      listImgs: null
    }
  },
  mounted(){
    this.listImgs= this.imgs
  },
  methods: {
    removeImg(id, index){
      this.destroy(this.routes.destroy.replace('id', id));
      this.listImgs.splice(index, 1);
    }
  }
}
</script>

<style lang="css">

  .img-box img{
    width: 100%;
  }

</style>
